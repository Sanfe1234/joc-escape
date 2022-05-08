@extends('layouts.admin')
<?php




?>
@section('title')
    Crear Voucher
@endsection

@section('contingut')
    <div class="container mt-5">
        <form action="/save-voucher" method="POST">
            @csrf
            <div class="form-group">
                <label for="userId">Id Usuari</label>
                <input type="text" class="form-control" name="userId" id="userId" placeholder="ID de l'usuari">
            </div>
            <div class="form-group">
                <label for="discount">% Descompte</label>
                <input type="number" class="form-control" name="discount" id="discount" placeholder="% de descompte">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection






