<?php

use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ReviewerController;
use App\Http\Middleware\VerificaNonReviewer;
use App\Http\Middleware\VerificaReviewer;
use Illuminate\Support\Facades\Route;

// Rotte protette dall'autenticazione
Route::middleware(['auth'])->group(function() {
    // Creare, modificare e cancellare articoli
    Route::get('/advertise/create', [AdvertiseController::class, 'create'])->name('advertise.create');

    // Middleware che verifica che utente non sia reviewer
    Route::middleware([VerificaNonReviewer::class])->group(function () {
        Route::get('/reviewer/richiesta', [ReviewerController::class, 'richiesta'])->name('reviewer.richiesta');
        Route::post('/reviewer/richiesta/submit', [PublicController::class, 'invia_richiesta_submit'])->name('reviewer.submit');
    });

    // Middleware che verifica che utente sia reviewer
    Route::middleware([VerificaReviewer::class])->group(function () {
        // Accettazione/declino annuncio
        Route::post('/advertise/accetta/{advertise}', [ReviewerController::class, 'accetta'])->name('reviewer.accetta');
        Route::post('/advertise/declina/{advertise}', [ReviewerController::class, 'declina'])->name('reviewer.declina');

        // Area reviewer
        Route::get('/reviewer/area', [ReviewerController::class, 'reviewerArea'])->name('reviewer.area');
        Route::get('/reviewer/area/users', [ReviewerController::class, 'reviewerUsers'])->name('reviewer.users');
        Route::get('/reviewer/area/advertises', [ReviewerController::class, 'reviewerAdvertises'])->name('reviewer.advertises');
        Route::post('/reviewer/area/users/makeReviewer/{user}', [ReviewerController::class, 'makeReviewer'])->name('reviewer.makeReviewer');

        // Annunci declinati
        Route::get('/reviewer/area/declinedAdvertises', [ReviewerController::class, 'declinedAdvertises'])->name('reviewer.declinedAdvertises');
        Route::post('/advertise/reset/{advertise}', [ReviewerController::class, 'reset'])->name('reviewer.reset');
        Route::post('/advertise/delete/{advertise}', [ReviewerController::class, 'delete'])->name('reviewer.delete');
    });
});

// Rotte pubbliche
Route::get('/', [PublicController::class, 'home'])->name('homepage');
Route::get('/advertise/index', [AdvertiseController::class, 'index'])->name('advertise.index');
Route::get('/advertise/{advertise}', [AdvertiseController::class, 'show'])->name('advertise.show');
Route::get('/advertise/category/{advertise}', [AdvertiseController::class, 'category'])->name('advertise.category');
Route::post('/advertise/search', [AdvertiseController::class, 'search'])->name('advertise.search');
Route::get('/advertise/category/{category}', [AdvertiseController::class, 'indexCategory'])->name('advertise.index.category');