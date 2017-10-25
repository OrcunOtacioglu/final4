<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $table = 'seats';

    protected $fillable = [
        'rate_id',
        'zone_id',
        'order_id',
        'reference',
        'row',
        'seat',
        'status',
    ];

    public function rate()
    {
        return $this->belongsTo(Rate::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
