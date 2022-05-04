@extends('layouts.app')
<?php




?>
@section('title')
    Crear Joc
@endsection

@section('contingut')
    <section class="form">

        <form action="/save-game" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name"> Nom:
                <input type="text" id="name" name="name">
            </label>
            <label for="max"> Màxim de jugadors:
                <input type="number" min="1" id="max" value="1" name="max">
            </label>
            <label for="min"> Mínim de jugadors:
                <input type="number" min="1" id="min" value="1" name="min">
            </label>
            <label for="min"> Imatge destacada:
                <input type="file" name="image">
            </label>
            <button>
                Crear Joc
            </button>
        </form>

    </section>

@endsection






