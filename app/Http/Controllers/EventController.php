<?php

namespace App\Http\Controllers;

use App\Entities\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        //@TODO This will get the published events and show them in the new layout format.
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

    public function show($slug)
    {
        // @TODO Add Venue mapping for the Event and detect the mobile users. If the user
        // @is not on mobile device, show seat mapping.
        $event = Event::where('slug', '=', $slug)->first();

        return view('frontend.entities.event.show', compact('event'));
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
