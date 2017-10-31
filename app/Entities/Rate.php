<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Rate extends Model
{
    protected $table = 'rates';

    protected $fillable = [
        'name',
        'color_code',
        'price',
        'available',
        'available_online',
        'available_box_office',
        'online_fee',
        'box_office_fee',
        'online_comission',
        'box_office_comission',
        'tax_percentage',
    ];

    public function zone()
    {
        return $this->belongsToMany(Zone::class);
    }

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    public static function createNew(Request $request)
    {
        $rate = new Rate();

        $rate->name = $request->name;
        $rate->color_code = $request->color_code;
        $rate->price = $request->price;
        $rate->zones = $request->zones;

        $rate->available = $request->zones != null
            ? self::calculateAvailable($request->zones)
            : 0;
        $rate->available_online = $request->available_online;
        $rate->available_box_office = $request->available_box_office;

        $rate->online_fee = $request->online_fee == null ? 0.0 : $request->online_fee;
        $rate->box_office_fee = $request->box_office_fee == null ? 0.0 : $request->box_office_fee;

        $rate->online_comission = $request->online_comission == null ? 0.0 : $request->online_comission;
        $rate->box_office_comission = $request->box_office_comission == null ? 0.0 : $request->box_office_comission;

        $rate->tax_percentage = $request->tax_percentage;

        $rate->created_at = Carbon::now();
        $rate->updated_at = Carbon::now();
        $rate->save();

        return $rate;
    }

    public static function updateEntity(Request $request, $id)
    {
        $rate = Rate::findOrFail($id);

        $rate->name = $request->name;
        $rate->color_code = $request->color_code;
        $rate->price = $request->price;
        $rate->zones = $request->zones;

        $rate->available = $request->zones != null
            ? self::calculateAvailable($request->zones)
            : 0;
        $rate->available_online = $request->available_online;
        $rate->available_box_office = $request->available_box_office;

        $rate->online_fee = $request->online_fee == null ? 0.0 : $request->online_fee;
        $rate->box_office_fee = $request->box_office_fee == null ? 0.0 : $request->box_office_fee;

        $rate->online_comission = $request->online_comission == null ? 0.0 : $request->online_comission;
        $rate->box_office_comission = $request->box_office_comission == null ? 0.0 : $request->box_office_comission;

        $rate->tax_percentage = $request->tax_percentage;

        $rate->updated_at = Carbon::now();
        $rate->save();

        return $rate;
    }

    public static function calculateAvailable($data)
    {
        $zones = explode('.', $data);
        $available = 0;

        foreach ($zones as $zone)
        {
            $dbZone = Zone::where('name', '=', $zone)->first();
            $seats = Seat::where('zone_id', '=', $dbZone->id)->get();

            foreach ($seats as $seat) {
                if ($seat->status == 1) {
                    $available = $available + 1;
                }
            }
        }

        return $available;
    }
}
