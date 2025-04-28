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

// Rotas públicas
Route::prefix('/categories')->group(function () {
    Route::post('/add', [TicketsController::class, 'addCategory'])->name("categories.search");
    Route::get('/search', [TicketsController::class, 'searchCategorie'])->name("categories.search");
});