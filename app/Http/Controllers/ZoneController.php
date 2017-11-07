<?php

namespace App\Http\Controllers;

use App\Entities\Rate;
use App\Entities\Seat;
use App\Entities\Zone;
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

        return view('dashboard.zone.index', compact('zones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.zone.create');
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

        return view('dashboard.zone.edit', compact('zone', 'rates'));
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

    public function getData($id)
    {
        $zone = Zone::findOrFail($id);

        return $zone;
    }

    public function generateSeats($id)
    {
        $zone = Zone::findOrFail($id);
        $seats = json_decode($zone->objects, true);

        foreach ($seats['objects'] as $object) {
            $rate = Rate::find($object['categoryID']);
            $seat = new Seat();

            $seat->rate_id = $object['categoryID'] == 0 ? null : $object['categoryID'];
            $seat->zone_id = $id;
            $seat->order_id = null;
            $seat->reference = $object['reference'];
            $seat->category = $object['category'];
            $seat->row = $object['row'];
            $seat->seat = $object['number'];
            $seat->top = $object['top'];
            $seat->left = $object['left'];
            $seat->status = $object['status'];
            $seat->cost = $rate->cost;

            $seat->created_at = Carbon::now();
            $seat->updated_at = Carbon::now();

            $seat->save();
        }

        return redirect()->action('ZoneController@index');
    }

    public function getBackup($id)
    {
        $zone = Zone::findOrFail($id);

        Storage::disk('local')->put('backups/' . $zone->name . '.json', $zone->objects);

        return redirect()->action('ZoneController@index');
    }

    public function addZoneName(Request $request, $zone)
    {
        $zone = Zone::findOrFail($zone);
        $rate = Rate::find($request->zone_rate);
        $zoneName = $rate->name . '-' . $zone->name;

        $data = json_decode($zone->objects, true);

        $viewName = [
            'angle' => 180,
            'backgroundColor' => "",
            'charSpacing' => 0,
            'clipTo' => null,
            'fill' => 'rgb(40,44,53)',
            'fillRule' => 'nonzero',
            'flipX' => 'false',
            'flipY' => 'false',
            'fontFamily' => 'Times New Roman',
            "fontSize"=> 40,
   			"fontStyle"=> "normal",
   			"fontWeight"=> "normal",
   			"hasControls"=> false,
   			"hasBorders"=> false,
   			"height"=> 45,
   			"left"=> 1500,
   			"lineHeight"=> 1.2,
   			"linethrough"=> false,
   			"lockMovementX"=> true,
   			"lockMovementY"=> true,
   			"lockRotation"=> true,
   			"opacity"=> 1,
   			"originX"=> "left",
   			"originY"=> "top",
   			"overline"=> false,
   			"scaleX"=> 1,
   			"scaleY"=> 1,
   			"shadow"=> null,
   			"skewX"=> 0,
   			"skewY"=> 0,
   			"stroke"=> null,
   			"strokeDashArray"=> null,
   			"strokeLineCap"=> "butt",
   			"strokeLineJoin"=> "miter",
   			"strokeMitterLimit"=> 10,
   			"strokeWidth"=> 1,
   			"text"=> $zoneName,
   			"textAlign"=> "left",
   			"textBackgroundColor"=> "",
   			"top"=> 75,
   			"transformMatrix"=> null,
   			"type"=> "text",
   			"underline"=> false,
   			"version"=> "2.0.0-beta7",
   			"visible"=> true,
   			"width"=> 185
        ];

        array_push($data['objects'], $viewName);

        $objects = json_encode($data, true);

        $zone->previous_objects == null
            ? $zone->previous_objects = $objects
            : $zone->previous_objects = $zone->objects;

        $zone->objects = $objects;
        $zone->save();

        return redirect()->action('ZoneController@index');
    }
}
