<?php

namespace App\Http\Controllers;

use App\Entities\Rate;
use App\Entities\Seat;
use App\Entities\Zone;
use App\Events\ZoneUpdated;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zones = Zone::all();

        return view('dashboard.entities.zone.index', compact('zones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.entities.zone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $zone = new Zone();

        $zone->name = $request->name;
        $zone->screen_name = $request->screen_name;
        // @TODO IMPLEMENT IMAGE UPLOADER
        $zone->image_path = null;

        $zone->created_at = Carbon::now();
        $zone->updated_at = Carbon::now();

        $zone->save();

        return redirect()->action('ZoneController@edit', ['id' => $zone->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zone = Zone::findOrFail($id);
        $rates = Rate::all();

        return view('dashboard.entities.zone.edit', compact('zone', 'rates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zone = Zone::findOrFail($id);
        $zone->delete();

        return redirect()->action('ZoneController@index');
    }

    public function addSeats(Request $request, $id)
    {
        $zone = Zone::findOrFail($id);
        $rate = Rate::find($request->rate_id);

        if ($rate == null) {
            $categoryID = 0;
            $category = '';
            $colorCode = '76838F';
        } else {
            $categoryID = $rate->id;
            $category = $rate->name;
            $colorCode = $rate->color_code;
        }

        $zone->objects != null
            ? $data = json_decode($zone->objects, true)
            : $data = ['objects' => []];

        if ($request->direction == 0) {
            for ($i = 0; $i < $request->seat_count; $i++) {
                $seat = [
                    'type'  => 'seat',
                    'left'  => intval($request->left + ($i * 25)),
                    'top'   => intval($request->top),
                    'number' => $request->start_number + $i,
                    'row'   => $request->row,
                    'status' => $request->status,
                    'zone'  => $zone->name,
                    'reference' => 'S_' . $zone->name . '_' . $request->row . '_' . ($request->start_number + $i),
                    'categoryColor' => $colorCode,
                    'category' => $category,
                    'categoryID' => $categoryID
                ];

                array_push($data['objects'], $seat);
            }
        } else {
            $rightSeatNumber = $request->start_number - $request->seat_count;
            for ($i = $request->start_number; $i > $rightSeatNumber; $i--) {
                $seat = [
                    'type'  => 'seat',
                    'left'  => intval($request->left + (($request->start_number - $i) * 25)),
                    'top'   => intval($request->top),
                    'number' => $i,
                    'row'   => $request->row,
                    'status' => $request->status,
                    'zone'  => $zone->name,
                    'reference' => 'S_' . $zone->name . '_' . $request->row . '_' . $i,
                    'categoryColor' => $colorCode,
                    'category' => $category,
                    'categoryID' => $categoryID
                ];

                array_push($data['objects'], $seat);
            }
        }

        $objects = json_encode($data, true);

        $zone->previous_objects == null
            ? $zone->previous_objects = $objects
            : $zone->previous_objects = $zone->objects;

        $zone->objects = $objects;
        $zone->save();

        return redirect()->action('ZoneController@edit', ['id' => $zone->id]);
    }

    public function getData($zoneName)
    {
        $zone = Zone::where('name', '=', $zoneName)->first();

        return $zone;
    }

    public function generateSeats($id)
    {
        $zone = Zone::findOrFail($id);
        $seats = json_decode($zone->objects, true);

        foreach ($seats['objects'] as $object) {

            if ($object['type'] == 'seat') {
                $rate = Rate::find($object['categoryID']);
                $seat = new Seat();

                $seat->rate_id = $object['categoryID'] == 0 ? null : $object['categoryID'];
                $seat->zone_id = $id;
                $seat->cart_id = null;
                $seat->reference = $object['reference'];
                $seat->category = $object['category'];
                $seat->row = $object['row'];
                $seat->seat = $object['number'];
                $seat->top = $object['top'];
                $seat->left = $object['left'];
                $seat->status = $object['status'];
                $seat->cost = $rate == null ? 0 : $rate->cost;

                $seat->created_at = Carbon::now();
                $seat->updated_at = Carbon::now();

                $seat->save();
            }
        }

        return redirect()->action('ZoneController@index');
    }

    public function getBackup($id)
    {
        $zone = Zone::findOrFail($id);

        Storage::disk('local')->put('backups/' . $zone->name . '.json', $zone->objects);

        return redirect()->action('ZoneController@index');
    }

    public function refreshZone($id)
    {
        $updatedZones = [];
        array_push($updatedZones, $id);

        event(new ZoneUpdated($updatedZones));

        return redirect()->action('ZoneController@index');
    }
}
