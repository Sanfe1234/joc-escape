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

    <!--
    <section class="games">
        <div class="ls_container">
            <div class="games-wrapper">
                @foreach($jocs as $j)
        <div class="games__item">
            <a href="jocs/{{$j->id}}" class="games__item-container">
                            <img class="games__item__img"
                                 src="{{\App\Http\Controllers\ImageController::getImage($j->id)['url']}}"
                                 alt="Card image cap">
                            <div class="games__item__content">
                                <h5 class="games__item__content__title">{{$j->name}} | {{$j->id}} </h5>
                            </div>
                        </a>
                        <a href="jocs/{{$j->id}}/edit">Editar</a>
                    </div>

                @endforeach
        </div>
    </div>
</section>
-->

    <a href="/new-game">Crear Joc</a>

@endsection






