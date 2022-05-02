<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="public/css/main.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Escapes Manolito</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!--
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                -->
            </ul>
            @if(session('admin'))
                <a href="/llista-jocs" class="btn text-white my-2 my-sm-0">Jocs</a>
                <a href="/llista-users" class="btn text-white my-2 my-sm-0">Usuaris</a>
                <a href="/llista-resenyes" class="btn text-white my-2 my-sm-0">Resenyes</a>
                <a href="/llista-experiencies" class="btn text-white my-2 my-sm-0">Experiencies</a>
                <a href="/llista-reserves" class="btn text-white my-2 my-sm-0">Reserves</a>
                <a href="/llista-vouchers" class="btn text-white my-2 my-sm-0">Vouchers</a>
                <a href="/llista-sales" class="btn text-white my-2 my-sm-0">Sales</a>
            @endif
            @if(Auth::check())
                <p class="bg-primary badge mt-3 mr-4 fs-2" style="font-size: 20px">Welcome: {{ Auth::user()->name }}</p>
                <a href="/log-out" class="btn btn-outline-success my-2 my-sm-0">LogOut</a>
            @else
                <a href="/new-user" class="btn btn-outline-light mr-3 my-2 my-sm-0">Regstrar-se</a>
                <a href="/login-page" class="btn btn-outline-success my-2 my-sm-0">Login</a>
            @endif
        </div>
    </nav>

</header>

<body class="antialiased">

@yield('contingut')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
<script src="{{ asset('/js/main.js') }}" type="text/javascript"></script>
</body>
</html>

