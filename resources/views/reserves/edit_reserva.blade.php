@extends('layouts.admin')
<?php




?>
@section('title')
    Editar Voucher
@endsection

@section('contingut')
    <div class="container mt-5">
        <form action="/save-reserva" method="POST">
            @csrf
            <div class="form-group">
                <label for="userId">Id Usuari</label>
                <input type="text" class="form-control" name="userId" id="userId" placeholder="ID de l'usuari"
                       value="{{ old('userId', $reserva->id_user) }}">
            </div>
            <div class="form-group">
                <label for="salaId">Id Sala</label>
                <input type="text" class="form-control" name="salaId" id="salaId" placeholder="ID de la sala"
                       value="{{ old('salaId', $reserva->id_sala) }}">
            </div>
            <div class="form-group">
                <label for="data_reserva">Data de reserva</label>
                <input type="datetime-local" class="form-control" name="data_reserva" id="data_reserva"
                       value="{{ old('data_reserva', $reserva->data_reserva) }}">
            </div>
            <input type="hidden" name="validat" id="validat" value="{{ old('validat', $reserva->validat) }}">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection
