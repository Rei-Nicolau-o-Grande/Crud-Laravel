@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

    <div class="col-md-6 offset-md-3">
        <form action="/events" method="post">
            @csrf
            <h1 class="text-center">Crie um evento</h1>
            <div class="form-group">
                <label for="title" class="form-label mb-2">Titulo do Evento:</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="date" class="form-label mb-2">Data do Evento:</label>
                <input type="date" name="date" class="form-control" placeholder="Data do Evento">
            </div>

            <div class="form-group">
                <label for="city" class="form-label mb-2">Cidade:</label>
                <input type="text" name="city" class="form-control" placeholder="Cidade do evento">
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
                    <option value="1">Sim</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description" class="form-label mb-2">Descrição:</label>
                <textarea type="text" name="description" class="form-control" placeholder="Descrição do evento">
                </textarea>
            </div>

            <input type="submit" class="btn btn-primary mt-3" value="Cria Evento">
        </form>
    </div>
@endsection
