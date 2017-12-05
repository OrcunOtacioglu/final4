<?php

namespace App\Http\Controllers;

use App\Entities\Booking;
use App\Entities\BookingItem;
use App\Entities\Hotel;
use App\Entities\HotelRoom;
use App\Entities\Order;
use App\Entities\Sale;
use App\Entities\Seat;
use App\Events\BookingCreated;
use App\Events\ZoneUpdated;
use App\Jobs\CheckBookingStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();

        return view('box-office.entities.booking.index', compact('bookings'))->withCookie(Cookie::forget('bookingRef'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notAvailableSeats = [];

        foreach ($request->items as $seat) {
            if (!Seat::checkIfAvailable($seat)) {
                array_push($notAvailableSeats, $seat);
            }
        }

        if (count($notAvailableSeats)) {
            return response()->json([
                'status' => 0,
                'message' => 'Selected seats are not available',
                'seats' => $notAvailableSeats,
                'reference' => null
            ]);
        } else {
            if ($request->hasCookie('bookingRef')) {
                $booking = Booking::updateEntity($request->cookie('bookingRef'), $request->items);
            } else {
                $booking = Booking::createNew($request->items);
            }
        }

        event(new BookingCreated($booking));

        return response()->json([
            'status' => 1,
            'message' => 'Success!',
            'seats' => null,
            'reference' => $booking->reference,
        ])->cookie('bookingRef', $booking->reference, 20);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $reference
     * @return \Illuminate\Http\Response
     */
    public function show($reference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $reference
     * @return \Illuminate\Http\Response
     */
    public function edit($reference)
    {
        $booking = Booking::where('reference', '=', $reference)->first();
        $hotels = Hotel::all();

        return view('box-office.entities.booking.edit', compact('booking', 'hotels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $reference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $reference)
    {
        $booking = Booking::where('reference', '=', $reference)->first();

        $booking->user_id = $request->user_id;

        $booking->offer = $request->offer != null ? $request->offer : $booking->subtotal;

        $booking->booked_until = $request->booked_until;
        $booking->updated_at = Carbon::now();

        $booking->save();

        Booking::calculateTotal($booking);

        CheckBookingStatus::dispatch($booking)
            ->delay(Carbon::now()->addDays($booking->booked_until));

        return redirect()->action('BookingController@edit', ['reference' => $booking->reference]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addHotel(Request $request, $reference)
    {
        $booking = Booking::where('reference', '=', $reference)->first();

        $room = HotelRoom::where([
            ['type', '=', $request->usage],
            ['hotel_id', '=', $request->hotel_id]
        ])->first();

        $details = [
            'Info' => $room->misc,
            'Use' => $room->name
        ];

        for ($i = 1; $i <= $request->roomCount; $i++) {
            BookingItem::createNew($booking, 2, $room, $details, 1);
        }

        Booking::calculateTotal($booking);

        return redirect()->action('BookingController@edit', ['reference' => $booking->reference]);
    }

    public function convertBooking(Request $request, $reference)
    {
        $booking = Booking::where('reference', '=', $reference)->first();

        $order = Order::createFromBooking($booking->reference);

        Sale::createNewFromOrder($order, $request->payment_type, 'Box Office');

        $updatedZones = [];

        foreach ($booking->items as $item)
        {
            if ($item->type == 1) {
                $seat = Seat::where('reference', '=', $item->reference)->first();

                $seat->status = 6;
                $seat->updated_at = Carbon::now();
                $seat->save();

                if (!in_array($seat->zone_id, $updatedZones)) {
                    array_push($updatedZones, $seat->zone_id);
                }
            }
        }

        event(new ZoneUpdated($updatedZones));

        foreach ($booking->items as $item) {
            if ($item->type == 2) {
                $room = HotelRoom::where('reference', '=', $item->reference)->first();

                $room->hotel->total_availability -= 1;
                $room->hotel->online_availability -= 1;

                $room->hotel->updated_at = Carbon::now();
                $room->hotel->save();
            }
        }

        return redirect()->action('BookingController@edit', ['reference' => $booking->reference]);
    }
}
