<?php

namespace App\Http\Controllers;

use App\Entities\Analytics;
use App\Entities\Event;
use App\Entities\Hotel;
use App\Entities\Rate;
use App\Entities\Sale;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('frontend.index', compact('events'));
    }

    public function dashboard()
    {
        $sales = Sale::all();
        $customers = User::where('is_admin', '=', false)->get();
        $hotels = Hotel::all();

        $rawAnalytics = Analytics::find(1);
        $analytics = json_decode($rawAnalytics->analytics, true);
        $totalAvailableSeats = $analytics['general_info']['total_remaining_ticket_count'];
        $totalAvailableHotels = $analytics['general_info']['extra_breakdown']['hotels']['general_info']['total_available'];

        return view('dashboard.index', compact('sales', 'customers', 'hotels', 'totalAvailableHotels', 'totalAvailableSeats'));
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
