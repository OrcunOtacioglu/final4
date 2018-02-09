<?php

namespace App\Http\Controllers;

use App\Entities\Cart;
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
                'items' => []
            ];

            foreach ($cart->items as $item) {
                $singleItem = [
                    'name' => $item->name,
                    'reference' => $item->reference,
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
        } else {
            $cart = Cart::createNew($request);
            Cart::addItems($cart, $request);
        }

        return response()->json($cart, 200)->withCookie('cart_uuid', $cart->reference);
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
}
