<?php

namespace App\Http\Controllers;

use App\Entities\Order;
use App\Entities\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaleController extends Controller
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
        //
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
        //
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
        //
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

    public function generateSales()
    {
        $orders = Order::where('status', '=', 4)->get();

        foreach ($orders as $order) {
            $sale = new Sale();

            $sale->reference = $order->reference;
            $sale->order_id = $order->id;
            $sale->user_id = $order->user_id;
            $sale->cost = $order->cost;
            $sale->profit = $order->profit;
            $sale->comission = $order->comission;
            $sale->subtotal = $order->subtotal;
            $sale->fee = $order->fee;
            $sale->total = $order->total;
            $sale->currency_code = $order->currency_code;

            $sale->created_at = $order->updated_at;
            $sale->updated_at = Carbon::now();

            $sale->save();
        }

        return redirect()->action('ApplicationController@dashboard');
    }
}
