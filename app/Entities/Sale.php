<?php

namespace App\Entities;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    protected $fillable = [
        'reference',
        'order_id',
        'user_id',
        'cost',
        'profit',
        'comission',
        'subtotal',
        'fee',
        'total',
        'currency_code'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createNewFromOrder($order)
    {
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

        $sale->created_at = Carbon::now();
        $sale->updated_at = Carbon::now();

        $sale->save();
    }
}
