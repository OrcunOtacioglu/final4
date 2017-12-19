<?php

namespace App\Http\Controllers;

use App\Entities\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('dashboard.entities.event.index', compact('events'));
    }

    public function create()
    {
        return view('dashboard.entities.event.create');
    }

    public function store(Request $request)
    {
        $event = Event::createNew($request);

        return redirect()->action('EventController@edit', ['id' => $event->id]);
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('dashboard.entities.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::updateEntity($request, $id);

        return redirect()->action('EventController@edit', ['id' => $event->id]);
    }

    public function destroy($id)
    {

    }
}
