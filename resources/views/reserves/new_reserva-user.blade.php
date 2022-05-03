@extends('layouts.app')
<?php



?>
@section('title')
    Crear Voucher
@endsection

@section('contingut')
    <div class="container mt-5 mb-5">

        <div class="card mb-3">
            <img class="card-img-top" src="{{\App\Http\Controllers\ImageController::getImage($joc->id)['url']}}"
                 alt="Card image cap" style="height: 350px; object-fit: contain">
            <div class="card-body">
                <h5 class="card-title text-center">{{$joc->name}}</h5>
                <p><b>Usuari:</b> {{Auth::user()->name}}</p>
                @if(Auth::user()->company)
                    <p><b>Empresa:</b> {{ Auth::user()->company }}</p>
                @endif
            </div>
        </div>

        <form action="/save-reserva" method="POST">
            @csrf
            <input type="hidden" name="userId" id="userId" value="{{ Auth::id() }}">
            <input type="hidden" name="minPlayers" id="minPlayers" value="{{ $joc->min_players }}">
            <input type="hidden" name="maxPlayers" id="maxPlayers" value="{{ $joc->max_players }}">
            <div class="form-group">
                <label for="data_reserva">Data de reserva *</label>
                <input type="datetime-local" class="form-control" name="data_reserva" id="data_reserva">
            </div>
            <div class="form-group">
                <label for="data_reserva">Sala *</label>
                <select class="form-select" name="sala">
                    <option selected>Sel·leccionar sala</option>
                    @foreach($sales as $s)
                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <h4>Participants</h4>
            @for ($i = 0; $i < ($joc->max_players - 1); $i++)
                <div class="form-group">
                    <label for="data_reserva">
                        Participant {{ ($i + 2) }} {{ (($i + 1) < $joc->min_players) ? '*' : ''}}
                    </label>
                    <input type="text" class="form-control" name="participant-{{ ($i + 2) }}"
                           id="participant-{{ ($i + 2) }}"
                           placeholder="Nom i Cognom">
                </div>
            @endfor
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection






