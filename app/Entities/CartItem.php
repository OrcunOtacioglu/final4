<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_items';

    protected $fillable = [
        'reference',
        'cart_id',
        'type',
        'name',
        'details',
        'quantity',
        'cost',
        'profit_margin',
        'subtotal'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public static function createNew(Cart $cart, $cartItem)
    {
        $itemData = self::determineItemType($cartItem);

        $item = new CartItem();

        $item->reference = $itemData['reference'];

        $item->cart_id = $cart->id;
        $item->type = $itemData['type'];

        $item->name = $itemData['name'];
        $item->details = $itemData['details'];

        $item->cost = $itemData['cost'];
        $item->comission = $itemData['comission'];
        $item->fee = $itemData['fee'];
        $item->profit_margin = $itemData['profit_margin'];
        $item->profit = $itemData['profit'];
        $item->subtotal = $itemData['subtotal'];

        $item->created_at = Carbon::now();
        $item->updated_at = Carbon::now();

        $item->save();

        return $item;
    }

    public static function isAlreadyOnCart(Cart $cart, $item)
    {
        foreach ($cart->items as $cartItem) {
            if ($cartItem->reference === $item['reference']) {
                return true;
            }
        }

        return false;
    }

    public static function determineItemType($item)
    {
        switch ($item['type']) {
            case 'seat':
                return self::prepareSeatData($item);
                break;
            case 'hotel':
                return self::prepareHotelData($item);
                break;
        }
    }

    public static function prepareSeatData($item)
    {
        $seat = Seat::where('reference', '=', $item['reference'])->first();

        $itemData = [
            'reference' => $seat->reference,
            'type' => 'seat',
            'name' => $seat->rate->name,
            'details' => $seat->rate->event->name,
            'comission_percentage' => $seat->rate->comission_percentage,
            'fee_percentage' => $seat->rate->fee_percentage,
            'cost' => $seat->rate->cost,
            'profit_margin' => $seat->rate->profit_margin,
        ];

        $itemData = self::calculateItemFinancials($itemData);

        return $itemData;
    }

    public static function prepareHotelData($item)
    {
        $room = HotelRoom::where('reference', '=', $item['reference'])->first();

        $itemData = [
            'reference' => $room->reference,
            'type' => 'hotel',
            'name' => $room->room_type,
            'details' => $room->hotel->name,
            'comission_percentage' => $room->comission_percentage,
            'fee_percentage' => $room->fee_percentage,
            'cost' => $room->cost,
            'profit_margin' => $room->profit_margin
        ];

        $itemData = self::calculateItemFinancials($itemData);

        return $itemData;
    }

    protected static function calculateItemFinancials($itemData)
    {
        $itemData['comission'] = ($itemData['cost'] * $itemData['comission_percentage'] / 100);
        $itemData['fee'] = ($itemData['cost'] * $itemData['fee_percentage'] / 100);

        $itemData['subtotal'] = ($itemData['cost'] + ($itemData['cost'] * $itemData['profit_margin'] / 100 ) + $itemData['fee']);
        $itemData['profit'] = $itemData['subtotal'] - $itemData['cost'] - $itemData['comission'];

        return $itemData;
    }
}
