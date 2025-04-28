<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketsController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('/tickets')->group(function () {
        Route::get('/', [TicketsController::class, 'index'])->name("tickets.list");
        Route::get('/create', [TicketsController::class, 'create'])->name("tickets.create");
        Route::post('/store', [TicketsController::class, 'store'])->name("tickets.store");

    });
});
