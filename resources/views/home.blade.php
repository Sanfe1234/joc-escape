@extends('layouts.app')
<?php

use App\Models\Imatge;

?>
@section('title')
    Escapes Manolito
@endsection

@section('contingut')
    <div class="container mt-5">
        <div class="card-deck">
            @foreach($jocs as $j)
                <div class="card" style="width: 18rem;">
                    <img src="{{Imatge::find($j->id)['url']}}" class="card-img-top"
                         alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$j->name}} | {{$j->id}}</h5>
                        <a href="jocs/{{$j->id}}" class="btn btn-primary">Veure</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="app">
        <example-component></example-component>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>
@endsection






