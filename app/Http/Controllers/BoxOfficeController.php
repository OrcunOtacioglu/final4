<?php

namespace App\Http\Controllers;

use App\Entities\Rate;
use Illuminate\Http\Request;

class BoxOfficeController extends Controller
{
    public function index()
    {
        $rates = Rate::all()->sortByDesc('price');

        return view('box-office.index', compact('rates'));
    }
}
