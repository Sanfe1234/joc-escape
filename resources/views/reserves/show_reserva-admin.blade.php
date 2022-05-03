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
                <h5 class="card-title text-center"></h5>
                <p><b>Usuari:</b> {{ $buyer->name}}</p>
                <p><b>Joc:</b> {{ $joc->name}}</p>
                @if($buyer->company)
                    <p><b>Empresa:</b> {{ $buyer->company }}</p>
                @endif
                <p>Data de reserva: {{ $reserva->data_reserva }}</p>
                @if($reserva->validat == 0)
                    <p>Validat: NO <a href="/reserva/{{ $reserva->id }}/validar">Validar</a></p>
                @else
                    <p>Validat: SI</p>
                @endif
            </div>
        </div>

    </div>


@endsection






