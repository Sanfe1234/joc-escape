@extends('layouts.admin')
<?php

use App\Models\Imatge;

?>
@section('title')
    Gestor
@endsection

@section('contingut')
    <div id="app">
        <gestor-component></gestor-component>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>
@endsection






