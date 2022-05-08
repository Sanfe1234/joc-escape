@extends('layouts.admin')
<?php




?>
@section('title')
    Crear Usuari
@endsection

@section('contingut')
    <div class="container mt-5">
        <form action="/save-sala" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" name="name" id="name"
                       placeholder="Insereix el nom">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection






