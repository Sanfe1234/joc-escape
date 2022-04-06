@extends('layouts.app')
<?php




?>
@section('title')
    Editar Voucher
@endsection

@section('contingut')
    <div class="container mt-5">
        <form action="/vouchers/{{$voucher->id}}/update-voucher" method="POST">
            @csrf
            <div class="form-group">
                <label for="userId">ID Usuari</label>
                <input type="text" class="form-control" name="userId" id="userId" placeholder="ID de l'usuari"
                       value="{{ old('userId', $voucher->id_user) }}">
            </div>
            <div class="form-group">
                <label for="discount">% descompte</label>
                <input type="number" class="form-control" name="discount" id="discount" placeholder="% de descompte"
                       value="{{ old('name', $voucher->discount) }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection
