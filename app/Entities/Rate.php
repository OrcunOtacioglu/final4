<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Rate extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'rates';

    /**
     * Mass assignable fields.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'color_code',
        'cost',
        'profit_margin',
        'price',
        'minimum_profit_amount',
        'zones',
        'available',
        'available_online',
        'available_box_office',
        'online_fee',
        'box_office_fee',
        'online_comission',
        'box_office_comission',
        'tax_percentage',
    ];

    /**
     * Returns related Seat entities
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Creates a new Rate entity.
     *
     * @param Request $request
     * @return Rate
     */
    public static function createNew(Request $request)
    {
        $rate = new Rate();

        $rate->name = $request->name;
        $rate->color_code = $request->color_code;

        $rate->cost = $request->cost;
        $rate->profit_margin = $request->profit_margin;
        $rate->price = $request->price;
        $rate->minimum_profit_amount = $request->minimum_profit_amount;

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

    /**
     * Updates an existing Rate entity.
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public static function updateEntity(Request $request, $id)
    {
        $rate = Rate::findOrFail($id);

        $rate->name = $request->name;
        $rate->color_code = $request->color_code;

        $rate->cost = $request->cost;
        $rate->profit_margin = $request->profit_margin;
        $rate->price = $request->price;
        $rate->minimum_profit_amount = $request->minimum_profit_amount;

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

    /**
     * Calculates available seats for the given zones.
     *
     * @param $data string  Zones list string
     * @return int
     */
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

    public static function listZones($data)
    {
        $zones = explode('.', $data);

        return $zones;
    }
}
