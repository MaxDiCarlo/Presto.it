<?php

use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('homepage');

Route::middleware(['auth'])->group(function() {
    // creare, modificare e cancellare articoli
    Route::get('/advertise/create', [AdvertiseController::class, 'create'])->name('advertise.create');
    Route::post('/advertise/store', [AdvertiseController::class, 'store'])->name('advertise.store');
});