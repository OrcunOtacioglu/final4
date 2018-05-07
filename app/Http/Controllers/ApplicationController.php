<?php

namespace App\Http\Controllers;

use Acikgise\Helpers\Helpers;
use App\Entities\Analytics;
use App\Entities\Hotel;
use App\Entities\Order;
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
                'Ad' => $sale->user->name,
                'Soyad' => $sale->user->surname,
                'TCKN / Pasaport No' => $sale->user->identifier,
                'Adres' => $sale->user->address,
                'Giriş' => '18 Mayıs',
                'Çıkış' => '21 Mayıs',
                'Toplam' => $sale->total,
            ];

            if ($sale->user->citizenship === 'TR') {
                $individualSale['profit'] = $sale->profit - $sale->tax;
            } else {
                $individualSale['profit'] = $sale->profit;
            }

            $individualSale['Otel'] = Sale::getHotelName($sale);
            $individualSale['Oda Sayısı'] = Sale::getHotelCount($sale);
            $individualSale['SGL Use Sayısı'] = Sale::getSGLRoomCount($sale);
            $individualSale['DBL Use Sayısı'] = Sale::getDBLRoomCount($sale);
            $individualSale['Bilet Sayısı'] = Sale::getTicketCount($sale);
            $individualSale['Bilet Kategorisi'] = Sale::getCatName($sale);
            $individualSale['Otel Maliyet'] = Sale::getHotelCost($sale);
            $individualSale['Bilet Maliyet'] = Sale::getTicketCost($sale);

            array_push($data, $individualSale);
        }

        return $data;
    }

    public function exportUsers()
    {
        $users = User::all();

        return $users;
    }

    public function export()
    {
        $sales = Sale::all();

        $data = [];

        foreach ($sales as $sale) {
            $individualSale = [
                'user' => $sale->user->name . ' ' . $sale->user->surname,
                'cost' => $sale->cost,
                'profit' => $sale->profit,
                'comission' => $sale->comission,
                'subtotal' => $sale->subtotal,
                'fee' => $sale->fee,
                'total' => $sale->total,
                'payment type' => $sale->payment_type,
                'payment channel' => $sale->payment_channel,
                'tax' => $sale->tax,
                'net income' => $sale->net_income,
                'purchase time' => $sale->updated_at
            ];

            $individualSale['items'] = [];

            foreach ($sale->order->items as $item) {
                $individualItem = [
                    'name' => $item->name,
                    'quantity' => $item->quantity,
                    'reference' => $item->reference,
                    'profit_margin' => $item->profit_margin,
                    'cost' => $item->unit_price
                ];

                array_push($individualSale['items'], $individualItem);
            }

            array_push($data, $individualSale);
        }

        return $data;
    }
}
