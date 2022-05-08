@extends('layouts.admin')
<?php




?>
@section('title')
    Crear Joc
@endsection

@section('contingut')
    <div class="container mt-5">
        <form action="/save-game" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" name="name" id="name"
                       placeholder="Insereix el nom">
            </div>
            <div class="form-group">
                <label for="price"> Preu:</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="max"> Màxim de jugadors:</label>
                <input type="number" class="form-control" min="1" id="max" value="1" name="max">
            </div>
            <div class="form-group">
                <label for="min"> Mínim de jugadors:</label>
                <input type="number" class="form-control" min="1" id="min" value="1" name="min">
            </div>
            <div class="form-group">
                <label for="image"> Imatge destacada:</label>
                <input type="file" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>

@endsection






