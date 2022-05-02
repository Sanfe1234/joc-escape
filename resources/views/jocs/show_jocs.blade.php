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
                <th scope="col">Màxim de jugadors</th>
                <th scope="col">Mínim de jugadors</th>
            </tr>
            </thead>
            <tbody>

            @foreach($jocs as $j)
                <tr>
                    <th scope="row">{{ $j->id }}</th>
                    <td>{{ $j->name }}</td>
                    <td>{{ $j->max_players }}</td>
                    <td>{{ $j->min_players }}</td>
                    <td><a href="/jocs/{{ $j->id }}/delete" class="btn btn-primary">El·liminar</a></td>
                    <td><a href="/jocs/{{ $j->id }}/edit" class="btn btn-primary">Editar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="/new-game" class="btn btn-block btn-primary">Crear Jocs</a>
    </div>

@endsection






