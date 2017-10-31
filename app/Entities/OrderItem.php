<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'type',
        'reference',
        'quantity',
        'unit_price',
        'subtotal',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public static function createNew($order, $type, $entity, $details = null)
    {
        $item = new OrderItem();

        $item->order_id = $order->id;
        $item->type = $type;
        $item->name = $entity->category;
        $item->reference = $entity->reference;
        $item->quantity = 1;
        $item->unit_price = $entity->cost;
        $item->subtotal = $item->quantity * $item->unit_price;

        $item->created_at = Carbon::now();
        $item->updated_at = Carbon::now();

        $item->save();
    }
}
