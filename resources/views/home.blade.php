@extends('layouts.app')
<?php

use App\Models\Imatge;

?>
@section('title')
    Escapes Manolito
@endsection

@section('contingut')
    <div id="app">
        <home-games-component></home-games-component>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>
@endsection






