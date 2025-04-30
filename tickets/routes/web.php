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
        //View
        Route::get('/', [TicketsController::class, 'index'])->name("tickets.list");
        Route::get('/create', [TicketsController::class, 'create'])->name("tickets.create");
        
        //Get List
        Route::get('/datatable', [TicketsController::class, 'getTicketsTable'])->name("tickets.datatable");
        Route::post('/find/ticket/{id}', [TicketsController::class, 'getTicketsFind'])->name("tickets.find");

        //process
        Route::post('/store', [TicketsController::class, 'store'])->name("tickets.store");
        Route::post("/update/{id}", [TicketsController::class, 'update'])->name("tickets.update");
    });
});
