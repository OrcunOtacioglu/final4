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
        $sales = Sale::all();
        $customers = User::where('is_admin', '=', false)->get();
        $hotels = Hotel::all();
        $events = Event::all();

        $rawAnalytics = Analytics::find(1);
        $analytics = json_decode($rawAnalytics->analytics, true);
        $totalAvailableSeats = $analytics['general_info']['total_remaining_ticket_count'];
        $totalAvailableHotels = $analytics['general_info']['extra_breakdown']['hotels']['general_info']['total_available'];

        return view('dashboard.index', compact('sales', 'customers', 'hotels', 'totalAvailableHotels', 'totalAvailableSeats', 'events'));
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
