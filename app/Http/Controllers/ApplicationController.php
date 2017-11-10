<?php

namespace App\Http\Controllers;

use App\Entities\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function index()
    {
        if (env('SITE_OFFLINE')) {
            return view('layouts.countdown');
        }
        $rates = Rate::where('available_online', '=', true)->get()->sortByDesc('price');

        return view('frontend.index', compact('rates'));
    }

    public function dashboard()
    {
        return view('dashboard.index');
    }

    public function getVenue()
    {
        $venue = Storage::read('/public/venue.json');
        return $venue;
    }
}
