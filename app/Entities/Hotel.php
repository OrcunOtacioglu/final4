<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Hotel extends Model
{
    protected $table = 'hotels';

    protected $fillable = [
        'uuid',
        'name',
        'media_path',
        'stars',
        'review_point',
        'review_count',
        'location',
        'description',
        'facilities'
    ];

    public function rooms()
    {
        return $this->hasMany(HotelRoom::class);
    }

    public static function createNew(Request $request)
    {
        $hotel = new Hotel();

        $hotel->uuid = str_random(6);
        $hotel->name = $request->name;

        $hotel->media_path = strtolower(str_replace(' ', '_', $request->name));

        $hotel->stars = $request->stars;
        $hotel->review_point = $request->review_point;
        $hotel->review_count = $request->review_count;

        $hotel->location = $request->location;
        $hotel->description = $request->description;
        $hotel->facilities = $request->facilities;

        $hotel->created_at = Carbon::now();
        $hotel->updated_at = Carbon::now();

        $hotel->save();

        return $hotel;
    }
}
