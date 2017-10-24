<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    protected $table = 'hotel_rooms';

    protected $fillable = [
        'hotel_id',
        'name',
        'price',
        'type',
        'availability',
        'misc'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
