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

        return view('frontend.entities.hotel.index', compact('hotels'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();

        return view('dashboard.hotel.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.hotel.create');
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

        return view('dashboard.hotel.edit', compact('hotel'));
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
