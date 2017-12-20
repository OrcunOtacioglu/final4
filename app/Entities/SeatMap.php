<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public static function createNew(Request $request)
    {
        $seatmap = new SeatMap();

        $seatmap->venue_id = $request->venue_id;

        $seatmap->created_at = Carbon::now();
        $seatmap->updated_at = Carbon::now();

        $seatmap->save();

        return $seatmap;
    }

    public static function updateEntity(Request $request, $id)
    {
        $seatmap = SeatMap::findOrFail($id);

        $seatmap->venue_id = $request->venue_id;
        $seatmap->updated_at = Carbon::now();

        $seatmap->save();

        return $seatmap;
    }
}
