@extends('layouts.app')
<?php


?>
@section('title')
    {{ $joc->name }}
@endsection

@section('contingut')
   
    <div id="app">
        <single-joc-component></single-joc-component>
    </div>

    <script>
        window.posts = @json($joc->id)
    </script>
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection






