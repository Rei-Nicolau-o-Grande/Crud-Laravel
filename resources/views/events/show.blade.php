@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')
    <h1>Helo Word</h1>
    <div class="col-md-6 offset-md-1">
        <a href="/events/edit/{{ $event->id }}"><button type="submit" class="btn btn-info"><ion-icon name="create-outline"></ion-icon>Editar Evento</button></a>
        <form action="/events/{{ $event->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon>Deletar Evento</button>
        </form>
        <h2>{{ $event->title }}</h2>
        <p><b>Cidade: </b><ion-icon name="location-outline"></ion-icon> {{ $event->city }}</p>
        <p><b>O evento é privado: </b>{{ $event->private == 0 ? 'Não' : 'Sim' }}</p>
        <p><b>Descrição: </b>{!! ($event->description ) !!}</p>
        <div class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</div>
        <a class="btn btn-primary">Confirmar Presença</a>
        <h3>O evento conta com:</h3>
        <ul id="items-list">
            @foreach($event->items as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>

@endsection
