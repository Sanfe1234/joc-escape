@extends('layouts.admin')
<?php


use App\Models\User;

?>
@section('title')
    Llista Vouchers
@endsection

@section('contingut')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Usuari</th>
                <th scope="col">% Descompte</th>
            </tr>
            </thead>
            <tbody>

            @foreach($vouchers as $v)
                <tr>
                    <th scope="row">{{ $v->id }}</th>
                    <td>{{ User::find($v->id_user)->name }}</td>
                    <td>{{ $v->discount }}%</td>
                    <td><a href="/vouchers/{{ $v->id }}/destroy" class="btn btn-danger">Eliminar</a></td>
                    <td><a href="/vouchers/{{ $v->id }}/edit" class="btn btn-warning">Editar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- <a href="/new-voucher" class="btn btn-block btn-primary">Crear Voucher</a> -->
    </div>

@endsection






