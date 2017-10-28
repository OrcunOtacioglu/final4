<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    public static function createNew(Request $request)
    {
        $room = new HotelRoom();

        $room->hotel_id = $request->hotel_id;
        $room->name = $request->room_name;

        $room->price = $request->room_price;
        $room->comission = $request->comission != null
            ? $request->comission
            : 0;
        $room->fee = $request->fee != null
            ? $request->fee
            : 0;
        $room->tax_percentage = $request->tax_percentage != null
            ? $request->tax_percentage
            : 0;

        $room->type = $request->type;
        $room->availability = $request->availability;

        $room->misc = $request->misc;

        $room->created_at = Carbon::now();
        $room->updated_at = Carbon::now();
        $room->save();

        return $room;
    }
}
