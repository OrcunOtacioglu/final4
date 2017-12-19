<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $table = 'venues';

    protected $fillable = [
        'name',
        'postal_code',
        'timezone',
        'city',
        'country',
        'address',
        'longitude',
        'latitude',
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_venue');
    }

    public function seatmaps()
    {
        return $this->hasMany(SeatMap::class);
    }
}
