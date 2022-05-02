@extends('layouts.app')
<?php


?>
@section('title')
    {{ $joc->name }}
@endsection

@section('contingut')
    <section class="joc_single">
        <div class="ls_container">
            <div class="joc-single-wrapper">
                <div class="joc-single__content">
                    <div class="joc-single__content__title">
                        {{ $joc->name }}
                    </div>
                </div>

                <div class="joc-single__info">
                    <img class="joc-single__info__img"
                         src="{{\App\Http\Controllers\ImageController::getImage($joc->id)['url']}}"
                         alt="Card image cap">

                    <ul class="joc-single__info__players">
                        <li>
                            Màxim de jugadors: {{ $joc->max_players }}
                        </li>
                        <li>
                            Mínim de jugadors: {{ $joc->min_players }}
                        </li>
                    </ul>

                    @if(Auth::check())
                        <a href="/new-reserva-user">Reservar</a>
                    @else
                        Necessites <a href="/login-page">iniciar sessió</a> per reservar
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection






