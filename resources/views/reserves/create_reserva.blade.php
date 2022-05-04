@extends('layouts.admin')
<?php




?>
@section('title')
    Crear Voucher
@endsection

@section('contingut')
    <div class="container mt-5">
        <form action="/save-reserva" method="POST">
            @csrf
            <div class="form-group">
                <label for="userId">Id Usuari</label>
                <input type="text" class="form-control" name="userId" id="userId" placeholder="ID de l'usuari">
            </div>
            <div class="form-group">
                <label for="salaId">Id Sala</label>
                <input type="text" class="form-control" name="salaId" id="salaId" placeholder="ID de la sala">
            </div>
            <div class="form-group">
                <label for="data_reserva">Data de reserva</label>
                <input type="datetime-local" class="form-control" name="data_reserva" id="data_reserva">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection






