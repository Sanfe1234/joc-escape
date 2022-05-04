@extends('layouts.admin')
<?php




?>
@section('title')
    Llista Sales
@endsection

@section('contingut')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
            </tr>
            </thead>
            <tbody>

            @foreach($sales as $s)
                <tr>
                    <th scope="row">{{ $s->id }}</th>
                    <td>{{ $s->name }}</td>
                    <td><a href="/sales/{{ $s->id }}/destroy" class="btn btn-danger">Eliminar</a></td>
                    <td><a href="/sales/{{ $s->id }}/edit" class="btn btn-warning">Editar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="/new-sala" class="btn btn-block btn-primary">Crear Sala</a>
    </div>

@endsection






