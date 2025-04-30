<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rotas públicas
Route::post('/auth', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'createUser']);

Route::prefix('categorias')->group(function () {
    Route::post('/add', [TicketsController::class, 'addCategory'])->middleware('auth:sanctum')->name("categories.add");
    Route::get('/get', [TicketsController::class, 'searchCategorie'])->name("categories.search");
    Route::delete('/{id}', [TicketsController::class, 'destroyCategory']);
});

Route::prefix('tickets')->middleware('auth:sanctum')->group(function () {
    Route::post('/', [TicketsController::class, 'store']);
    Route::get('/{id}', [TicketsController::class, 'getTicketsFind']);
    Route::put('/{id}', [TicketsController::class, 'update']);
    Route::delete('/{id}', [TicketsController::class, 'destroy']);
});