<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InitController;
use App\Http\Controllers\JocController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\ResenyaController;
use App\Http\Controllers\ExperienciaController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Executa això per omplir la BBDD:
Route::get('/generate-BBDD', [InitController::class, 'loadBBDD']);

Route::get('/', [HomeController::class, 'index']);

Route::get('/Gestor', [HomeController::class, 'backoffice']);

Route::get('/login-page', function () {
    return view('login');
});

Route::post('/login', [LoginController::Class, 'login']);

Route::get('/log-out', [LoginController::Class, 'logout']);

//---------------------------   JOCS   ---------------------------\\

Route::get('/new-game', function () {
    return view('jocs.create_game');
});

Route::get('/jocs/{joc}', [JocController::class, 'showSingle']);

Route::get('/llista-jocs', [JocController::class, 'show']);

Route::get('/jocs/{joc}/edit', [JocController::Class, 'edit']);

Route::post('/save-game', [JocController::Class, 'save']);

Route::get('/jocs/{jocId}/delete', [JocController::Class, 'destroy']);

Route::post('/jocs/{joc}/update-game', [JocController::Class, 'update']);


//---------------------------   USERS   ---------------------------\\

Route::get('/new-user', function () {
    return view('users.create_user');
});

Route::get('/llista-users', [UserController::class, 'show']);

Route::get('/users/{user}/edit', [UserController::class, 'edit']);

Route::get('/users/{userId}/destroy', [UserController::class, 'destroy']);

Route::post('/save-user', [UserController::class, 'save']);

Route::post('/users/{user}/update-user', [UserController::Class, 'update']);


//---------------------------   SALES   ---------------------------\\

Route::get('/new-sala', function () {
    return view('sales.create_sala');
});

Route::get('/llista-sales', [SalaController::class, 'show']);

Route::get('/sales/{sala}/edit', [SalaController::class, 'edit']);

Route::get('/sales/{SalaId}/destroy', [SalaController::class, 'destroy']);

Route::post('/save-sala', [SalaController::class, 'save']);

Route::post('/sales/{sala}/update-sala', [SalaController::Class, 'update']);


//---------------------------   VOUCHERS   ---------------------------\\

Route::get('/new-voucher', function () {
    return view('vouchers.create_voucher');
});

Route::get('/llista-vouchers', [VoucherController::class, 'show']);

Route::get('/vouchers/{voucher}/edit', [VoucherController::class, 'edit']);

Route::get('/vouchers/{voucherId}/destroy', [VoucherController::class, 'destroy']);

Route::post('/save-voucher', [VoucherController::class, 'save']);

Route::post('/vouchers/{voucher}/update-voucher', [VoucherController::Class, 'update']);


//---------------------------   RESERVA   ---------------------------\\

Route::get('/new-reserva', function () {
    return view('reserves.create_reserva');
});

Route::get('/joc/{jocId}/reserva', [ReservaController::class, 'goToReserva']);

Route::get('/llista-reserves', [ReservaController::class, 'show']);

Route::get('/reserves/{reserva}/edit', [ReservaController::class, 'edit']);

Route::get('/reserves/{reservaId}/admin-see', [ReservaController::class, 'adminSee']);

Route::get('/reserva/{reservaId}/validar', [ReservaController::class, 'validar']);

Route::get('/reserves/{reservaId}/destroy', [ReservaController::class, 'destroy']);


Route::post('/save-reserva', [ReservaController::class, 'save']);

Route::post('/reserves/{reserva}/update-reserva', [ReservaController::Class, 'update']);


//---------------------------   EXPERIÈNCIA   ---------------------------\\

Route::get('/new-experiencia', function () {
    return view('experiencies.create_experiencia');
});

Route::get('/llista-experiencies', [ExperienciaController::class, 'show']);

Route::get('/experiencies/{experiencia}/edit', [ExperienciaController::class, 'edit']);

Route::get('/experiencies/{experienciaId}/destroy', [ExperienciaController::class, 'destroy']);

Route::post('/save-experiencia', [ExperienciaController::class, 'save']);

Route::post('/experiencies/{experiencia}/update-experiencia', [ExperienciaController::Class, 'update']);

Route::get('/experiencies/{experienciaId}/win', [ExperienciaController::class, 'win']);


//---------------------------   RESENYA   ---------------------------\\

Route::get('/new-resenya', function () {
    return view('resenyes.create_resenya');
});

Route::get('/llista-resenyes', [ResenyaController::class, 'show']);

Route::get('/resenyes/{resenya}/edit', [ResenyaController::class, 'edit']);

Route::get('/resenyes/{resenyaId}/destroy', [ResenyaController::class, 'destroy']);

Route::post('/save-resenya', [ResenyaController::class, 'save']);

Route::post('/resenyes/{resenya}/update-resenya', [ResenyaController::Class, 'update']);
