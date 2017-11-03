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
     * @param int $qty
     * @param null $details
     */
    public static function createNew($order, $type, $entity, $details = null, $qty = 1)
    {
        $item = new OrderItem();

        $item->order_id = $order->id;

        $item->type = $type;

        $item->name = $entity->category;
        $item->reference = $entity->reference;

        $item->details = json_encode($details, true);

        $item->profit_margin = $entity->rate != null ? $entity->rate->profit_margin : null;
        $item->minimum_profit_amount = $entity->rate != null ? $entity->rate->minimum_profit_amount : null;

        $item->quantity = $qty;
        $item->unit_price = $entity->cost;

        $item->subtotal = $item->quantity * $item->unit_price;

        $item->created_at = Carbon::now();
        $item->updated_at = Carbon::now();

        $item->save();
    }
}
