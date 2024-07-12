<?php

use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ReviewerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('homepage');

Route::middleware(['auth'])->group(function() {
    // creare, modificare e cancellare articoli
    Route::get('/advertise/create', [AdvertiseController::class, 'create'])->name('advertise.create');
    
    // richiesta autenticazione reviewer
    Route::get('/reviewer/richiesta', [ReviewerController::class, 'richiesta'])->name('reviewer.richiesta');
    Route::post('/reviewer/richiesta', [ReviewerController::class, 'send'])->name('reviewer.send');
    Route::get('/reviewer/area', [ReviewerController::class, 'reviewerArea'])->name('reviewer.area');

    // accettazione/declino annuncio
    Route::post('/advertise/accetta/{advertise}', [ReviewerController::class, 'accetta'])->name('reviewer.accetta');
    Route::post('/advertise/declina/{advertise}', [ReviewerController::class, 'declina'])->name('reviewer.declina');
});

Route::get('/advertise/index', [AdvertiseController::class, 'index'])->name('advertise.index');
Route::get('/advertise/{advertise}', [AdvertiseController::class, 'show'])->name('advertise.show');
Route::get('/advertise/category/{advertise}', [AdvertiseController::class, 'category'])->name('advertise.category');
Route::get('/richieste', [PublicController::class, 'invia_Richiesta'])->name('inviaRichiesta');
Route::post('/richieste/submit', [PublicController::class, 'invia_Richiesta_submit'])->name('submit');