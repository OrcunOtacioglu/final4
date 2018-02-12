<?php

namespace App\Http\Controllers;

use Acikgise\Helpers\Helpers;
use App\Entities\Cart;
use App\Entities\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Get Cart content
     *
     * @param $reference
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($reference)
    {
        $cart = Cart::where('reference', '=', $reference)->first();

        if (!is_null($cart)) {
            $data = [
                'cart' => $cart->reference,
                'serviceFees' => $cart->fee / 100,
                'subtotal' => ($cart->total - $cart->fee) / 100,
                'total' => $cart->total / 100,
                'items' => []
            ];

            foreach ($cart->items as $item) {
                $singleItem = [
                    'name' => $item->name,
                    'reference' => $item->reference,
                    'details' => $item->details,
                    'type' => $item->type
                ];

                array_push($data['items'], $singleItem);
            }
        } else {
            $data = [
                'cart' => $reference,
                'items' => null
            ];
        }

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addItems(Request $request)
    {
        $cart = Cart::where('reference', '=', $request->cookie('cart_uuid'))->first();

        if (!is_null($cart)) {
            Cart::addItems($cart, $request);
            Cart::checkForRemovedItems($cart, $request);
        } else {
            $cart = Cart::createNew($request);
            Cart::addItems($cart, $request);
        }

        return response()->json($cart, 200)->withCookie('cart_uuid', $cart->reference);
    }

    public function calculate(Request $request)
    {
        $total = 0;

        foreach ($request->items as $cartItem) {
            if ($cartItem['type'] === 'seat') {
                $itemData = CartItem::prepareSeatData($cartItem);

                $total += $itemData['subtotal'];
            } else {
                $itemData = CartItem::prepareHotelData($cartItem);

                $total += $itemData['subtotal'];
            }
        }

        $serviceFees = $total / 100 * 2.2;
        $total = $total + $serviceFees;

        $data = [
            'serviceFees' => Helpers::formatMoney($serviceFees / 100),
            'total' => Helpers::formatMoney($total / 100)
        ];

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $cart = Cart::where('reference', '=', $request->cookie('cart_uuid'))->first();

        // @TODO Book the seats and set a timer.

        return view('frontend.entities.cart.show', compact('cart'));
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
