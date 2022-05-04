<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('Backoffice')</title>

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

    <div class="debug-menu">
        <a href="/generate-BBDD">Generar BBDD</a>
        <!--
        <a href="/delete-BBDD">BORRAR BBDD</a>
        -->
    </div>


</header>

<body class="antialiased">

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/Gestor"
                   class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Escapes Manolito - BackOffice</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                    id="menu">
                    <li class="nav-item">
                        <a href="/Gestor" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="/llista-jocs" class="nav-link px-0 align-middle">
                            <span class="ms-1 d-none d-sm-inline">Jocs</span>
                        </a>
                    </li>
                    <li>
                        <a href="/llista-users" class="nav-link px-0 align-middle">
                            <span class="ms-1 d-none d-sm-inline">Usuaris</span>
                        </a>
                    </li>
                    <li>
                        <a href="/llista-resenyes" class="nav-link px-0 align-middle">
                            <span class="ms-1 d-none d-sm-inline">Resenyes</span>
                        </a>
                    </li>
                    <li>
                        <a href="/llista-experiencies" class="nav-link px-0 align-middle">
                            <span class="ms-1 d-none d-sm-inline">Experiencies</span>
                        </a>
                    </li>
                    <li>
                        <a href="/llista-reserves" class="nav-link px-0 align-middle">
                            <span class="ms-1 d-none d-sm-inline">Reserves</span>
                        </a>
                    </li>
                    <li>
                        <a href="/llista-vouchers" class="nav-link px-0 align-middle">
                            <span class="ms-1 d-none d-sm-inline">Vouchers</span>
                        </a>
                    </li>
                    <li>
                        <a href="/llista-sales" class="nav-link px-0 align-middle">
                            <span class="ms-1 d-none d-sm-inline">Sales</span>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="pb-4">
                    <p class=" mt-3 mr-4 fs-2" style="font-size: 20px">{{ Auth::user()->name }} - Admin</p>

                    <a href="/log-out" class="d-flex align-items-center text-white text-decoration-none"
                       id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="btn btn-outline-success my-2 my-sm-0">LogOut</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col py-3 mt-5">
            @yield('contingut')
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
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

