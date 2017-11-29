<?php

namespace App\Http\Controllers;

use App\Entities\Analytics;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        $jsonAnalytics = Analytics::find(1);

        $analytics = json_decode($jsonAnalytics->analytics, true);

//        dd($analytics);

        return view('dashboard.entities.analytics.index', compact('analytics'));
    }
}
