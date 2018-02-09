<?php

namespace App\Http\Controllers;

use App\Entities\Hotel;
use App\Entities\HotelRoom;
use App\Entities\Order;
use App\Entities\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HotelController extends Controller
{

    public function all()
    {
        $hotels = Hotel::all();
        $data = [];

        foreach ($hotels as $hotel) {
            $hotelItem = [
                'name' => $hotel->name,
                'description' => $hotel->description,
                'stars' => $hotel->stars,
                'review_point' => $hotel->review_point,
                'review_count' => $hotel->review_count,
                'city' => $hotel->city,
                'country' => $hotel->country,
                'address' => $hotel->address,
                'longitude' => $hotel->longitude,
                'latitude' => $hotel->latitude,
                'availability' => $hotel->online_availability,
                'available' => $hotel->available_online,
                'photos' => $hotel->photos,
                'rooms' => []
            ];

            foreach ($hotel->rooms as $room) {
                $roomData = [
                    'name' => $hotel->name,
                    'reference' => $room->reference,
                    'type' => 'hotel',
                    'room_type' => $room->room_type
                ];

                array_push($hotelItem['rooms'], $roomData);
            }

            array_push($data, $hotelItem);
        }

        return response()->json($data, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        if (!\request()->hasCookie('cart_uuid')) {
//            return redirect()->to('/');
//        }
        $hotels = Hotel::all();

        return view('frontend.entities.hotel.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.entities.hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotel = Hotel::createNew($request);

        return redirect()->action('HotelController@edit', ['id' => $hotel->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = Hotel::where('id', '=', $id)->with('rooms')->firstOrFail();

        return view('dashboard.entities.hotel.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Hotel::updateEntity($request, $id);

        return redirect()->action('HotelController@edit', ['id' => $id]);
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

    public function addHotel(Request $request, $id)
    {
        $order = Order::where('reference', '=', $request->cookie('orderRef'))->first();
        $room = HotelRoom::where([
            ['type', '=', $request->roomType],
            ['hotel_id', '=', $id]
        ])->first();

        if ($order === null) {
            // @TODO INDICATE THAT THEIR SESSION IS ENDED.
            return redirect()->to('/');
        }

        $details = [
            'Info' => $room->misc,
            'Use' => $room->name
        ];

        for($i = 1; $i <= $request->roomQty; $i++) {
            OrderItem::createNew($order, 2, $room, $details, 1);
        }

        Order::calculateTotal($order);

        return redirect()->action('OrderController@show', ['reference' => $order->reference]);
    }
}
