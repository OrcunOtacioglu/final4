<?php

namespace App\Http\Controllers;

use App\Entities\Analytics;
use App\Entities\Event;
use App\Entities\Hotel;
use App\Entities\Sale;
use App\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Webpatser\Uuid\Uuid;

class ApplicationController extends Controller
{
    public function index()
    {
        if (!\request()->hasCookie('cart_uuid')) {
            $cartUuid = Uuid::generate()->string;
            Cookie::queue(Cookie::make('cart_uuid', $cartUuid, 20));
        }

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
