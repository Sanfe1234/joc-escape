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

                    <form action="/jocs/{{ $joc->id }}/delete" method="POST">
                        @csrf
                        <input name="id" type="hidden" value="{{ $joc->id }}">
                        <button>BORRAR</button>
                    </form>
                    <a href="/jocs/{{$joc->id}}/edit" class="btn btn-primary">Editar</a>
                </div>
            </div>
        </div>
    </section>

@endsection






