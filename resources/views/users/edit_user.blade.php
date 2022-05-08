@extends('layouts.admin')
<?php




?>
@section('title')
    Editar Usuari
@endsection

@section('contingut')
    <div class="container mt-5">
        <form action="/users/{{$user->id}}/update-user" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom i Cognom</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}"
                       aria-describedby="emailHelp"
                       placeholder="Insereix el nom">
            </div>
            <div class="form-group">
                <label for="password">Contrassenya</label>
                <input type="password" class="form-control" name="password" id="password"
                       value="{{ old('password', $user->password) }}" aria-describedby="emailHelp"
                       placeholder="Insereix una contrassenya">
            </div>
            <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" class="form-control" name="dni" id="dni" aria-describedby="emailHelp"
                       value="{{ old('dni', $user->dni) }}"
                       placeholder="Insereix el teu dni">
            </div>
            <div class="form-group">
                <label for="mail">Email address</label>
                <input type="email" class="form-control" name="mail" id="mail" value="{{ old('mail', $user->mail) }}"
                       aria-describedby="emailHelp"
                       placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="phone">Telèfon</label>
                <input type="tel" class="form-control" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                       aria-describedby="emailHelp"
                       placeholder="Insereix el teu telèfon">
            </div>
            <div class="form-group">
                <label for="country">País</label>
                <input type="text" class="form-control" name="country" id="country"
                       value="{{ old('phone', $user->phone) }}" aria-describedby="emailHelp"
                       placeholder="Insereix el teu país">
            </div>
            <div class="form-group">
                <label for="company">Empresa (Opcional)</label>
                <input type="text" class="form-control" name="company" id="company"
                       value="{{ old('phone', $user->company) }}" aria-describedby="emailHelp"
                       placeholder="Insereix la teva empresa">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="adminCheck" name="admin">
                <label class="form-check-label" for="adminCheck">Admin?</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection






