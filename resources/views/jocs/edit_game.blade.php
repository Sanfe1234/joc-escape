@extends('layouts.app')
<?php




?>
@section('title')
    Editar Joc
@endsection


@section('contingut')
    <section class="form">
        <form action="/jocs/{{$joc->id}}/update-game" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name"> Nom:
                <input type="text" id="name" name="name" value="{{ old('name', $joc->name) }}">
            </label>
            <label for="max"> Màxim de jugadors:
                <input type="number" min="1" id="max" value="{{ old('max_players', $joc->max_players) }}" name="min">
            </label>
            <label for="min"> Mínim de jugadors:
                <input type="number" min="1" id="min" value="{{ old('min_players', $joc->min_players) }}" name="max">
            </label>
            <label for="min"> Imatge destacada:
                <input type="file" name="image">
            </label>
            <button type="submit">
                Guardar canvis
            </button>
        </form>
    </section>
@endsection






