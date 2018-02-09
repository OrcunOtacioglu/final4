<?php

namespace App\Http\Controllers;

use App\Entities\Event;
use Acikgise\Helpers\Helpers;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function index()
    {
        Helpers::checkCartCookie();

        $events = Event::all();

        return view('frontend.index', compact('events'));
    }

    public function dashboard()
    {
        $events = Event::all();

        return view('dashboard.index', compact('events'));
    }

    public function getVenue()
    {
        $venue = Storage::read('/public/venue.json');
        return $venue;
    }

    public function new()
    {
        return view('frontend.index');
    }
}
