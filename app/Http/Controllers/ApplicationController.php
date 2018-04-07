<?php

namespace App\Http\Controllers;

use App\Entities\Analytics;
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
        if (env('SITE_OFFLINE')) {
            return view('layouts.countdown');
        }
        $rates = Rate::where('available_online', '=', true)->get()->sortByDesc('price');

        return view('frontend.index', compact('rates'));
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

    public function excel()
    {
        $sales = Sale::all();

        $data = [];

        foreach ($sales as $sale) {
            $individualSale = [
                'person' => $sale->user->name . ' ' . $sale->user->surname,
                'identifier' => $sale->user->identifier,
                'address' => $sale->user->address,
                'cost' => $sale->cost,
                'total' => $sale->total
            ];

            if ($sale->user->citizenship === 'TR') {
                $individualSale['profit'] = $sale->profit - $sale->tax;
            } else {
                $individualSale['profit'] = $sale->profit;
            }

            foreach ($sale->order->items as $item) {
                $orderItem = [
                    'name' => $item->name,
                    'cost' => $item->unit_price
                ];

                array_push($individualSale['package'], $orderItem);
            }

            array_push($data, $individualSale);
        }

        return $data;
    }
}
