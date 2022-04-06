@extends('layouts.app')
<?php




?>
@section('title')
    Crear Resenya
@endsection

@section('contingut')
    <div class="container mt-5">
        <form action="/save-resenya" method="POST">
            @csrf
            <div class="form-group">
                <label for="userId">Id Usuari</label>
                <input type="number" class="form-control" name="userId" id="userId" placeholder="ID de l'usuari">
            </div>
            <div class="form-group">
                <label for="experienciaId">Id Experiència</label>
                <input type="number" class="form-control" name="experienciaId" id="experienciaId"
                       placeholder="Id de l'experiència">
            </div>
            <div class="form-group">
                <label for="valoracio">Valoració</label>
                <input type="number" class="form-control" name="valoracio" id="valoracio"
                       max="10" min="0" placeholder="Valoració">
            </div>
            <div class="form-group">
                <label for="text">Comentaris</label>
                <textarea type="textarea" class="form-control" name="text" id="text"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection






