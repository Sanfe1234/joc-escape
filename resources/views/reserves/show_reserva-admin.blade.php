@extends('layouts.admin')
<?php

//dd($joc)

?>
@section('title')
    Crear Voucher
@endsection

@section('contingut')
    <div class="container mt-5 mb-5">

        <div class="card mb-3">
            <div class="card-body">
                <p><b>Usuari:</b> {{ $client->name}}</p>
                <p><b>Joc:</b> {{ $joc->name}}</p>
                @if($client->company)
                    <p><b>Empresa:</b> {{ $client->company }}</p>
                @endif
                <p><b>Data de reserva:</b> {{ $reserva->data_reserva }}</p>
                @if($reserva->validat == 0)
                    <p><b>Validat:</b> NO <a href="/reserva/{{ $reserva->id }}/validar">Validar</a></p>
                @else
                    <p><b>Validat:</b> SI</p>
                @endif
                <br>

                <h6 class="card-title">Participants</h6>
                @if($participants)
                    @foreach($participants as $p)
                        - {{ $p->name }}
                        <br>
                    @endforeach
                @else
                    *No hi han participants*
                @endif
            </div>
        </div>

    </div>


@endsection






