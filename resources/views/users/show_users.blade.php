@extends('layouts.admin')
<?php




?>
@section('title')
    Llista Usuaris
@endsection

@section('contingut')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Mail</th>
                <th scope="col">Telèfon</th>
                <th scope="col">País</th>
                <th scope="col">Empresa</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $u)
                <tr>
                    <th scope="row">{{ $u->id }}</th>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->mail }}</td>
                    <td>{{ $u->phone }}</td>
                    <td>{{ $u->country }}</td>
                    <td>{{ $u->company }}</td>
                    <td><a href="/users/{{ $u->id }}/destroy" class="btn btn-danger">Eliminar</a></td>
                    <td><a href="/users/{{ $u->id }}/edit" class="btn btn-warning">Editar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="/new-user" class="btn btn-block btn-primary">Crear Users</a>
    </div>

@endsection






