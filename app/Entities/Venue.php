<?php

namespace App\Entities;

use Acikgise\Helpers\Helpers;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Venue extends Model
{
    protected $table = 'venues';

    protected $fillable = [
        'name',
        'photo',
        'postal_code',
        'timezone',
        'city',
        'country',
        'address',
        'longitude',
        'latitude',
    ];

    public function seatmaps()
    {
        return $this->hasMany(SeatMap::class);
    }

    public static function createNew(Request $request)
    {
        $venue = new Venue();

        $venue->name = $request->name;

        $venue->photo = Helpers::uploadImage($request, 'venue-photos', 'venue_photo');

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

        $venue->photo = $request->venue_photo != null ? Helpers::uploadImage($request, 'venue-photos', 'venue_photo') : $venue->photo;

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
