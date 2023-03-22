@extends('layouts.main')
@section('title', 'HDC Events')

@section('content')
    <h1>Helo Word</h1>
    @if($search)
        <h2>Buscando por {{ $search }}</h2>
    @else

    @endif
    <div id="search-container" class="col-md-4">
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" value="{{ $search }}" placeholder="Procurar...">
            <input type="submit" class="btn btn-success" value="Buscar">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        <h2>Proximos Eventos</h2>
        <p>Veja os eventos dos próximos dias</p>
        <div id="cards-container" class="row">
            @foreach($events as $event)
                <div class="card col-md-3">
                    <div class="card-body">
                        <div class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</div>
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-participantes">{{ $event->private == 0 ? 'Não' : 'Sim' }}</p>
                        <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
            @if(count($events) == 0)
                <p>Não há eventos disponiveis</p>
            @endif
        </div>
    </div>

@endsection
