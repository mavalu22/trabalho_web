
<?php

use App\Http\Controllers\AssuntoController;
use App\Http\Controllers\MensagemController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {


});
Route::get('/mensagem', [MensagemController::class, 'index']);
Route::post('/mensagem', [MensagemController::class, 'store']);
Route::get('/mensagem/{id}', [MensagemController::class, 'show']);
Route::put('/mensagem/{id}', [MensagemController::class, 'update']);
Route::delete('/mensagem/{id}', [MensagemController::class, 'destroy']);

Route::get('/assunto', [AssuntoController::class, 'index']);
Route::post('/assunto', [AssuntoController::class, 'store']);
Route::get('/assunto/{id}', [AssuntoController::class, 'show']);
Route::put('/assunto/{id}', [AssuntoController::class, 'update']);
Route::delete('/assunto/{id}', [AssuntoController::class, 'destroy']);


Route::get('/usuario', [UserController::class, 'index']);
Route::post('/usuario', [UserController::class, 'store']);
Route::get('/usuario/{id}', [UserController::class, 'show']);
Route::put('/usuario/{id}', [UserController::class, 'update']);
Route::delete('/usuario/{id}', [UserController::class, 'destroy']);