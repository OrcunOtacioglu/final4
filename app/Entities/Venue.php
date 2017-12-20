<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    public static function createNew(Request $request)
    {
        $venue = new Venue();

        $venue->name = $request->name;

        $venue->postal_code = $request->postal_code;
        $venue->timezone = $request->timezone;
        $venue->city = $request->city;
        $venue->country = $request->country;
        $venue->address = $request->address;
        $venue->longitude = $request->longitude;
        $venue->latitude = $request->latitude;

        $venue->created_at = Carbon::now();
        $venue->updated_at = Carbon::now();

        $venue->save();

        return $venue;
    }

    public static function updateEntity(Request $request, $id)
    {
        $venue = Venue::findOrFail($id);

        $venue->name = $request->name;

        $venue->postal_code = $request->postal_code;
        $venue->timezone = $request->timezone;
        $venue->city = $request->city;
        $venue->country = $request->country;
        $venue->address = $request->address;
        $venue->longitude = $request->longitude;
        $venue->latitude = $request->latitude;

        $venue->updated_at = Carbon::now();

        $venue->save();

        return $venue;
    }
}
