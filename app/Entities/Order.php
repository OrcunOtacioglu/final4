<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'reference',
        'user_id',
        'status',
        'subtotal',
        'comission',
        'total',
        'currency_code',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
