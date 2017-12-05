<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'seats';

    /**
     * Mass assignable fields.
     *
     * @var array
     */
    protected $fillable = [
        'rate_id',
        'zone_id',
        'order_id',
        'reference',
        'category',
        'row',
        'seat',
        'top',
        'left',
        'status',
        'cost'
    ];

    /**
     * Returns related Rate entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rate()
    {
        return $this->belongsTo(Rate::class);
    }

    /**
     * Returns related Zone entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    /**
     * Returns related Order entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Checks whether the given seat is available.
     *
     * @param $item
     * @return bool
     */
    public static function checkIfAvailable($item)
    {
        $seat = Seat::where('reference', '=', $item['reference'])->first();

        if ($seat->status === 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkIfBookingAvailable($item)
    {
        $seat = Seat::where('reference', '=', $item['reference'])->first();

        if ($seat->status != 6) {
            return true;
        } else {
            return false;
        }
    }
}
