@extends('layouts.app')
<?php



?>
@section('title')
    Reserves - {{ $user->name }}
@endsection

@section('contingut')

    <div id="app">
        <user-reserves-component></user-reserves-component>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>

@endsection






