<?php

namespace App\Http\Controllers;

use App\Entities\SeatMap;
use App\Entities\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeatMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seatmaps = SeatMap::all();

        return view('dashboard.entities.seat-map.index', compact('seatmaps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $venues = Venue::all();
        return view('dashboard.entities.seat-map.create', compact('venues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seatmap = SeatMap::createNew($request);

        return redirect()->action('SeatMapController@edit', ['id' => $seatmap->id]);
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
        $seatmap = SeatMap::findOrFail($id);
        $venues = Venue::all();

        return view('dashboard.entities.seat-map.edit', compact('seatmap', 'venues'));
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
        $seatmap = SeatMap::updateEntity($request, $id);

        return redirect()->action('SeatMapController@edit', ['id' => $seatmap->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function all()
    {
        $seatmaps = SeatMap::all();

        return response()->json($seatmaps, 200);
    }
}
