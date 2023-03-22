<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index () {

        $search = request('search');

        if ($search) {
            $events = Event::where('title', 'like', '%'.$search.'%')
                ->orWhere('description', 'like', '%'.$search.'%')
                ->get();

        } else {

            $events = Event::all();

        }


        return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create () {
        return view('events.create');
    }

    public function store (Request $request) {

        $event = new Event();

        $event->title = $request->title;
        $event->date = $request->date;
        $event->description = $request->description;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->items = $request->items;

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show ($id) {

        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);
    }

    public function destroy ($id){

        Event::findOrFail($id)->delete();

        return redirect('/')->with('msg', 'Evento apagado');

    }

    public function edit ($id) {

        $event = Event::findOrFail($id);

        return view('events.edit', ['event' => $event]);
    }

    public function update ($id, Request $request) {
        Event::findOrFail($id)->update($request->all());

        return redirect('/')->with('msg', 'Evento atualizado com sucesso!');
    }


}
