<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'order_items';

    /**
     * Mass assignable fields
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'type',
        'name',
        'reference',
        'details',
        'quantity',
        'unit_price',
        'subtotal',
    ];

    /**
     * Returns related Order instance
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Creates a new OrderItem entity.
     *
     * @param $order
     * @param $type
     * @param $entity
     * @param null $details
     */
    public static function createNew($order, $type, $entity, $details = null)
    {
        $item = new OrderItem();

        $item->order_id = $order->id;

        $item->type = $type;

        $item->name = $entity->category;
        $item->reference = $entity->reference;

        $item->details = $details;

        $item->quantity = 1;
        $item->unit_price = $entity->cost;
        $item->subtotal = $item->quantity * $item->unit_price;

        $item->created_at = Carbon::now();
        $item->updated_at = Carbon::now();

        $item->save();
    }
}
