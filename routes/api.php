<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MesasController;
use App\Http\Controllers\ReservasController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/cadastro', [AuthController::class, 'cadastroUsuario']);

Route::get('/mesas', [MesasController::class, 'index']);

Route::post('/reserva', [ReservasController::class, 'fazerReserva']);
Route::get('/reserva', [ReservasController::class, 'listarReservas']);


