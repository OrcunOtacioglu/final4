<?php

namespace App\Http\Controllers;

use App\Entities\Booking;
use App\Entities\Seat;
use App\Events\BookingCreated;
use App\Jobs\CheckBookingStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        return view('box-office.entities.booking.edit', compact('booking'));
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

        $booking->booked_until = $request->booked_until;
        $booking->updated_at = Carbon::now();

        $booking->save();

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
}
