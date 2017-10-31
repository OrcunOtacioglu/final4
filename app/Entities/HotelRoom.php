<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class HotelRoom extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'hotel_rooms';

    /**
     * Mass assignable fields
     *
     * @var array
     */
    protected $fillable = [
        'hotel_id',
        'name',
        'category',
        'reference',
        'cost',
        'price',
        'comission',
        'fee',
        'tax_percentage',
        'type',
        'misc'
    ];

    /**
     * Returns associated Hotel entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    /**
     * Creates a new HotelRoom
     *
     * @param Request $request
     * @return HotelRoom
     */
    public static function createNew(Request $request)
    {
        $hotel = Hotel::findOrFail($request->hotel_id);

        $room = new HotelRoom();

        $room->hotel_id = $request->hotel_id;

        $room->name = $request->room_name;
        $room->category = $hotel->name;
        $room->reference = str_random(6);

        $room->cost = $request->cost;
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

        $room->misc = $request->misc;

        $room->created_at = Carbon::now();
        $room->updated_at = Carbon::now();
        $room->save();

        return $room;
    }

    /**
     * Updates an existing HotelRoom
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public static function updateEntity(Request $request, $id)
    {
        $room = HotelRoom::findOrFail($id);

        $room->name = $request->room_name;

        $room->cost = $request->cost;
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

        $room->misc = $request->misc;

        $room->created_at = Carbon::now();
        $room->save();

        return $room;
    }
}
