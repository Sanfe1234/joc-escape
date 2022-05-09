@extends('layouts.app')
<?php

?>
@section('title')
    Login
@endsection

@section('contingut')

    <div class="container mt-5">
        <form action="/login" method="POST" class="mb-3">
            @csrf
            <div class="form-group">
                <label for="mail">Correu</label>
                <input type="text" class="form-control" name="mail" id="mail"
                       placeholder="Insereix el correu">
                <label for="password">Contrassenya</label>
                <input type="password" class="form-control" name="password" id="password"
                       placeholder="Insereix la contrassenya">
            </div>
            <button type="submit" class="btn btn-primary" id="submit-login">Submit</button>
        </form>
        <div id="error-wrapper">

        </div>
    </div>

    @if(!session('loginError'))

    @else
        <div class="container mt-3" id="server-error">
            <div class="alert alert-danger" role="alert">
                {{ Session::get('loginError') }}
            </div>
        </div>
    @endif

    {{ Session::put('loginError', false) }}
@endsection






