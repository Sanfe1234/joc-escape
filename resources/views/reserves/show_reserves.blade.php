@extends('layouts.admin')
<?php


use App\Models\User;
use App\Models\Joc;
use App\Models\Sala;

?>
@section('title')
    Llista Reserves
@endsection

@section('contingut')
    <div class="container">
        <h2>Reserves</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Usuari</th>
                <th scope="col">Joc</th>
                <th scope="col">Sala</th>
                <th scope="col">Data de reserva</th>
                <th scope="col">Validat?</th>
            </tr>
            </thead>
            <tbody>

            @foreach($reserves as $r)
                <tr>
                    <th scope="row">{{ $r->id }}</th>
                    <td>{{ User::find($r->id_user)->name }}</td>
                    <td>{{ Joc::find($r->id_joc)->name }}</td>
                    <td>{{ Sala::find($r->id_sala)->name }}</td>
                    <td>{{ $r->data_reserva }}</td>
                    <td>{{ $r->validat }}</td>
                    <td><a href="/reserves/{{ $r->id }}/destroy" class="btn btn-danger">Eliminar</a></td>
                    <td><a href="/reserves/{{ $r->id }}/edit" class="btn btn-warning">Editar</a></td>
                    <td><a href="/reserves/{{ $r->id }}/admin-see" class="btn btn-primary">Veure</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!--
        <a href="/new-reserva" class="btn btn-block btn-primary">Crear Reserva</a>
        -->
    </div>

@endsection






