@extends('layouts.app')
<?php

?>
@section('title')
    Login
@endsection

@section('contingut')

    <div class="container mt-5">
        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
                <label for="mail">Correu</label>
                <input type="text" class="form-control" name="mail" id="mail"
                       placeholder="Insereix el correu">
                <label for="password">Contrassenya</label>
                <input type="password" class="form-control" name="password" id="password"
                       placeholder="Insereix la contrassenya">
            </div>
            <button type=" submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection






