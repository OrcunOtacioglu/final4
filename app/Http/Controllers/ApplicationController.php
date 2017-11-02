<?php

namespace App\Http\Controllers;

use App\Entities\Rate;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $rates = Rate::where('available_online', '=', true)->get()->sortByDesc('price');

        return view('frontend.index', compact('rates'));
    }

    public function dashboard()
    {
        return view('dashboard.index');
    }
}
