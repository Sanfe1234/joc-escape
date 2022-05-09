@extends('layouts.app')
<?php



?>
@section('title')
    Descomptes - {{ $user->name }}
@endsection

@section('contingut')

    <div id="app">
        <user-voucher-component></user-voucher-component>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>

@endsection






