@extends('layouts.app')
<?php




?>
@section('title')
    Crear Voucher
@endsection

@section('contingut')
    <div class="container mt-5">
        <form action="/save-reserva" method="POST">
            @csrf
            <input type="hidden" name="userId" id="userId" value="">
            <input type="hidden" name="salaId" id="salaId" value="">
            <div class="form-group">
                <label for="data_reserva">Data de reserva</label>
                <input type="datetime-local" class="form-control" name="data_reserva" id="data_reserva">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection






