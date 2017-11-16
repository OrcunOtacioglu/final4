<?php

namespace App\Http\Controllers;

use App\Entities\Settings;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::all();

        return view('dashboard.entities.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.entities.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $settings = new Settings();

        $settings->profile_name = $request->profile_name;
        $settings->client_id = $request->client_id;
        $settings->storekey = $request->storekey;
        $settings->currency_code = $request->currency_code;

        $settings->created_at = Carbon::now();
        $settings->updated_at = Carbon::now();

        $settings->save();

        return redirect()->action('SettingsController@index');
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
        $settings = Settings::findOrFail($id);

        return view('dashboard.entities.settings.edit', compact('settings'));
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
        $settings = Settings::findOrFail($id);

        $settings->profile_name = $request->profile_name;
        $settings->client_id = $request->client_id;
        $settings->storekey = $request->storekey;
        $settings->currency_code = $request->currency_code;
        $settings->updated_at = Carbon::now();

        $settings->save();

        return redirect()->action('SettingsController@edit', ['id' => $settings->id]);
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
}
