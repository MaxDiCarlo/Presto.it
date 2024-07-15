<?php

use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ReviewerController;
use App\Http\Middleware\CheckReviewer;
use App\Http\Middleware\VerificaNonReviewer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\VerificaReviewer;

Route::get('/', [PublicController::class, 'home'])->name('homepage');

Route::middleware(['auth'])->group(function() {
    // creare, modificare e cancellare articoli
    Route::get('/advertise/create', [AdvertiseController::class, 'create'])->name('advertise.create');

    // middleware che verifica che utente non sia reviewer
    Route::middleware([VerificaNonReviewer::class])->group(function () {
        Route::get('/reviewer/richiesta', [ReviewerController::class, 'richiesta'])->name('reviewer.richiesta');
        Route::post('/reviewer/richiesta/submit', [PublicController::class, 'invia_richiesta_submit'])->name('reviewer.submit');
    });

    // middleware che verifica che utente sia reviewer
    Route::middleware([VerificaReviewer::class])->group(function () {
        // accettazione/declino annuncio
        Route::post('/advertise/accetta/{advertise}', [ReviewerController::class, 'accetta'])->name('reviewer.accetta');
        Route::post('/advertise/declina/{advertise}', [ReviewerController::class, 'declina'])->name('reviewer.declina');

        // area reviewer
        Route::get('/reviewer/area', [ReviewerController::class, 'reviewerArea'])->name('reviewer.area');
        Route::get('/reviewer/area/users', [ReviewerController::class, 'reviewerUsers'])->name('reviewer.users');
        Route::get('/reviewer/area/advertises', [ReviewerController::class, 'reviewerAdvertises'])->name('reviewer.advertises');
        Route::post('/reviewer/area/users/makeReviewer/{user}', [ReviewerController::class, 'makeReviewer'])->name('reviewer.makeReviewer');

        // annunci declinati
        Route::get('/reviewer/area/declinedAdvertises', [ReviewerController::class, 'declinedAdvertises'])->name('reviewer.declinedAdvertises');
        Route::post('/advertise/reset/{advertise}', [ReviewerController::class, 'reset'])->name('reviewer.reset');
        Route::post('/advertise/delete/{advertise}', [ReviewerController::class, 'delete'])->name('reviewer.delete');
    });
});

Route::get('/advertise/index', [AdvertiseController::class, 'index'])->name('advertise.index');
Route::get('/advertise/{advertise}', [AdvertiseController::class, 'show'])->name('advertise.show');
Route::get('/advertise/category/{advertise}', [AdvertiseController::class, 'category'])->name('advertise.category');