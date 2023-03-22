@extends('layouts.main')

@section('title', 'Editar Evento')

@section('content')
    <div class="col-md-6 offset-md-3">
        <form action="/events/update/{{ $event->id }}" method="post">
            @csrf
            @method('PUT')
            <h1 class="text-center">Editando um evento</h1>
            <div class="form-group">
                <label for="title" class="form-label mb-2">Titulo do Evento:</label>
                <input type="text" name="title" class="form-control" value="{{ $event->title }}">
            </div>

            <div class="form-group">
                <label for="date" class="form-label mb-2">Data do Evento:</label>
                <input type="date" name="date" class="form-control" placeholder="Data do Evento" value="{{date('Y-m-d', strtotime($event->date));}}">
            </div>

            <div class="form-group">
                <label for="city" class="form-label mb-2">Cidade:</label>
                <input type="text" name="city" class="form-control" placeholder="Cidade do evento" value="{{ $event->city }}">
            </div>

            <div class="form-group">
                <label for="items" class="form-label mt-2">Adiconar items de infraestutura</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco"> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Agua Gratis"> Agua Gratis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Merenda Gratis"> Merenda Gratis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Estacionamento"> Estacionamento
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Brindes"> Brindes
                </div>
            </div>

            <div class="form-group">
                <label for="private" class="form-label mb-2">O evento é privado:</label>
                <select type="radio" name="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1" {{ $event->private == 1 ? "selected='selected'" : "" }}>Sim</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description" class="form-label mb-2">Descrição:</label>
                <textarea type="text" name="description" class="form-control" placeholder="Descrição do evento" >
                    {{ $event->description }}
                </textarea>
            </div>

            <input type="submit" class="btn btn-primary mt-3" value="Editar Evento">
        </form>
    </div>

@endsection
