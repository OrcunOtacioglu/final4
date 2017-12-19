<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class SeatMap extends Model
{
    protected $table = 'seat_maps';

    protected $fillable = [
        'venue_id',
        'mapping'
    ];

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function zones()
    {
        return $this->hasMany(Zone::class);
    }
}
