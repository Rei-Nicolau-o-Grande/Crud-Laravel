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

    public function storeImage (Request $request)
    {
        if ($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('upload')->move('public/uploads', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('public/uploads/' . $filenametostore);
            $message = 'File uploaded successfully';
            $result = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message')</script>";

            // adiciona esta linha para verificar o resultado
            die($result);
        }
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
