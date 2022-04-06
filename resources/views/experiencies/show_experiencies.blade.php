@extends('layouts.app')
<?php


use App\Models\User;
use App\Models\Joc;
use App\Models\Reserva;

?>
@section('title')
    Llista experiències
@endsection

@section('contingut')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Joc</th>
                <th scope="col">Client</th>
                <th scope="col">Empleat</th>
                <th scope="col">Completat?</th>
            </tr>
            </thead>
            <tbody>

            @foreach($experiencies as $e)
                <tr>
                    <th scope="row">{{ $e->id }}</th>
                    <td>{{ Joc::find($e->id_joc)->name }}</td>
                    <td>{{ User::find(Reserva::find($e->id_reserva)->id_user)->name }}</td>
                    <td>{{ User::find($e->id_empleat)->name }}</td>
                    <td>{{ $e->winner }}</td>
                    <td><a href="/experiencies/{{ $e->id }}/destroy" class="btn btn-primary">Eliminar</a></td>
                    <td><a href="/experiencies/{{ $e->id }}/edit" class="btn btn-primary">Editar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="/new-experiencia" class="btn btn-block btn-primary">Crear Experiència</a>
    </div>

@endsection






