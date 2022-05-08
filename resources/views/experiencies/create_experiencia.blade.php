@extends('layouts.admin')
<?php




?>
@section('title')
    Crear Experiència
@endsection

@section('contingut')
    <div class="container mt-5">
        <form action="/save-experiencia" method="POST">
            @csrf
            <div class="form-group">
                <label for="jocId">Id Joc</label>
                <input type="text" class="form-control" name="jocId" id="jocId" placeholder="ID del joc">
            </div>
            <div class="form-group">
                <label for="reservaId">Id Reserva</label>
                <input type="text" class="form-control" name="reservaId" id="reservaId" placeholder="ID de la reserva">
            </div>
            <div class="form-group">
                <label for="empleatId">Id Empleat</label>
                <input type="text" class="form-control" name="empleatId" id="empleatId" placeholder="ID de l'empleat">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection






