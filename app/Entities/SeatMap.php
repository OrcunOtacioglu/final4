<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeatMap extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'seat_maps';

    /**
     * Mass assignable fields.
     *
     * @var array
     */
    protected $fillable = [
        'reference',
        'name'
    ];

    public function zones()
    {
        return $this->hasMany(Zone::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public static function createNew(Request $request)
    {
        $seatmap = new SeatMap();

        $seatmap->reference = str_random(12);
        $seatmap->name = $request->name;

        $seatmap->created_at = Carbon::now();
        $seatmap->updated_at = Carbon::now();

        $seatmap->save();

        return $seatmap;
    }

    public static function updateEntity(Request $request, $id)
    {
        $seatmap = SeatMap::findOrFail($id);

        $seatmap->name = $request->name;

        $seatmap->updated_at = Carbon::now();
        $seatmap->save();

        return $seatmap;
    }
}
