<?php

namespace App\Http\Controllers;

use App\Entities\Rate;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $rates = Rate::all();

        return view('frontend.index', compact('rates'));
    }

    public function dashboard()
    {
        return view('dashboard.index');
    }
}
