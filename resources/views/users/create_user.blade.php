@extends('layouts.app')
<?php




?>
@section('title')
    Crear Usuari
@endsection

@section('contingut')
    <div class="container my-5">
        <form action="/save-user" class="mb-5" method="POST" id="register-form">
            @csrf
            <div class="form-group">
                <label for="name">Nom i Cognom</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp"
                       placeholder="Insereix el nom">
            </div>
            <div class="form-group">
                <label for="password">Contrassenya</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelp"
                       placeholder="Insereix una contrassenya">
            </div>
            <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" class="form-control" name="dni" id="dni" aria-describedby="emailHelp"
                       placeholder="Insereix el teu dni">
            </div>
            <div class="form-group">
                <label for="mail">Email address</label>
                <input type="email" class="form-control" name="mail" id="mail" aria-describedby="emailHelp"
                       placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="phone">Telèfon</label>
                <input type="tel" class="form-control" name="phone" id="phone" aria-describedby="emailHelp"
                       placeholder="Insereix el teu telèfon">
            </div>
            <div class="form-group">
                <label for="country">País</label>
                <input type="text" class="form-control" name="country" id="country" aria-describedby="emailHelp"
                       placeholder="Insereix el teu país">
            </div>
            <div class="form-group">
                <label for="company">Empresa (Opcional)</label>
                <input type="text" class="form-control" name="company" id="company" aria-describedby="emailHelp"
                       placeholder="Insereix la teva empresa">
            </div>
            @if(session('admin'))
                <div class="form-check mb-4">
                    <input type="checkbox" class="form-check-input" id="adminCheck" name="admin">
                    <label class="form-check-label" for="adminCheck">Admin?</label>
                </div>
            @endif
            <button type="submit" class="btn btn-primary" id="register-submit">Submit</button>
        </form>

        @if(session('loginError'))
            <div class="container mt-5">
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('loginError') }}
                </div>
            </div>
        @endif

        {{ Session::put('loginError', false) }}

        <div id="error-wrapper">

        </div>
    </div>


@endsection






