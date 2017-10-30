<?php

namespace App\Http\Controllers;

use App\Entities\Hotel;
use App\Entities\Order;
use App\Entities\Seat;
use App\Events\OrderCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

        // Check if the seats are available
        foreach ($request->items as $seat) {
            if (!Seat::checkIfAvailable($seat)) {
                array_push($notAvailableSeats, $seat);
            };
        }

        if (count($notAvailableSeats)) {
            return response()->json([
                'status' => 0,
                'message' => 'Selected seats are not available!',
                'seats' => $notAvailableSeats,
                'reference' => null,
            ]);
        } else {
            if ($request->hasCookie('orderRef')) {
                $order = Order::updateOrder($request->cookie('orderRef'), $request->items);
            } else {
                // If available create a new order
                $order = Order::createNew($request->items);
            }

            // Fire an event to draw the new seating map
            // Change Seat statuses
            event(new OrderCreated($order));

            return response()->json([
                'status' => 1,
                'message' => 'Success!',
                'seats' => null,
                'reference' => $order->reference,
            ])->cookie('orderRef', $order->reference, 20);
        }
    }

    /**
     * Display the specified Order with Hotels.
     *
     * @param $reference
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($reference)
    {
        $order = Order::where('reference', '=', $reference)->first();

        if (!Order::hasHotel($order)) {
            $hotels = Hotel::all();

            return view('frontend.entities.hotel.index', compact('hotels'));
        } else {
            if (Auth::guest()) {
                return view('frontend.entities.order.index', compact('order'));
            } else {
                $user = Auth::user();
                Order::appendUser($order, $user);
                return view('frontend.entities.order.show', compact('order'));
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update Order
     *
     * @param Request $request
     * @param $reference
     */
    public function update(Request $request, $reference)
    {
        $order = Order::where('reference', '=', $reference)->first();
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
