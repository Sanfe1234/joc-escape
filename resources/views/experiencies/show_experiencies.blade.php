@extends('layouts.admin')
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
        <h2>Experiències</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Joc</th>
                <th scope="col">Client</th>
                <th scope="col">Empleat</th>
                <th scope="col">Guanyat?</th>
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
                    <td><a href="/experiencies/{{ $e->id }}/destroy" class="btn btn-danger">Eliminar</a></td>
                    <td><a href="/experiencies/{{ $e->id }}/edit" class="btn btn-warning">Editar</a></td>
                    @if(!$e->winner)
                        <td><a href="/experiencies/{{ $e->id }}/win" class="btn btn-primary">Premiar</a></td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>

        <!--<a href="/new-experiencia" class="btn btn-block btn-primary">Crear Experiència</a>-->
    </div>

@endsection






