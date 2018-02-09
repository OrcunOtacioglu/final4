<?php

namespace App\Entities;

use Acikgise\Helpers\Helpers;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = [
        'reference',
        'user_id',
        'status',
        'cost',
        'subtotal',
        'comission',
        'fee',
        'tax',
        'total',
        'currency_code'
    ];

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public static function createNew(Request $request)
    {
        $cart = new Cart();
        $cart->reference = $request->hasCookie('cart_uuid')
            ? $request->cookie('cart_uuid')
            : Helpers::generateNewCartID();

        $cart->created_at = Carbon::now();
        $cart->updated_at = Carbon::now();

        $cart->save();

        return $cart;
    }

    public static function addItems(Cart $cart, Request $request)
    {
        foreach ($request->items as $item) {
            if (!CartItem::isAlreadyOnCart($cart, $item)) {
                $cartItem = CartItem::createNew($cart, $item);
                self::addToTotal($cart, $cartItem);
            }
        }

        return $cart;
    }

    public static function addToTotal(Cart $cart, CartItem $cartItem)
    {
        $cart->cost += $cartItem->cost;
        $cart->comission += $cartItem->comission;
        $cart->fee += $cartItem->fee;
        $cart->profit += $cartItem->profit;
        $cart->subtotal += $cartItem->subtotal;

        $cart->total = $cart->subtotal + $cart->fee;

        $cart->updated_at = Carbon::now();
        $cart->save();
    }
}
