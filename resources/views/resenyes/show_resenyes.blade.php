@extends('layouts.admin')
<?php


use App\Models\User;
use App\Models\Joc;
use App\Models\Experiencia;

?>
@section('title')
    Llista Resenyes
@endsection

@section('contingut')
    <div class="container">
        <h2>Resenyes</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Usuari</th>
                <th scope="col">Experiència</th>
                <th scope="col">Data</th>
                <th scope="col">Puntuació</th>
                <th scope="col">Comentaris</th>
            </tr>
            </thead>
            <tbody>

            @foreach($resenyes as $r)
                <tr>
                    <th scope="row">{{ $r->id }}</th>
                    <td>{{ User::find($r->id_user)->name }}</td>
                    <td>{{ Joc::find(Experiencia::find($r->id_experience)->id)->name }}</td>
                    <td>{{ $r->data_resenya }}</td>
                    <td>{{ $r->puntuacio }}</td>
                    <td>{{ $r->text }}</td>
                    <td><a href="/resenyes/{{ $r->id }}/destroy" class="btn btn-danger">Eliminar</a></td>
                    <td><a href="/resenyes/{{ $r->id }}/edit" class="btn btn-warning">Editar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- <a href="/new-resenya" class="btn btn-block btn-primary">Crear Voucher</a> -->
    </div>

@endsection






