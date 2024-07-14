<?php

use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ReviewerController;
use App\Http\Middleware\CheckReviewer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('homepage');

Route::middleware(['auth'])->group(function() {
    // creare, modificare e cancellare articoli
    Route::get('/advertise/create', [AdvertiseController::class, 'create'])->name('advertise.create');
    
    // richiesta autenticazione reviewer
    Route::get('/reviewer/richiesta', function () {
        if (Auth::check() && !Auth::user()->reviewer) {
            return app(ReviewerController::class)->richiesta();
        } else {
            return redirect('/');
        }
    })->name('reviewer.richiesta');

    Route::post('/reviewer/richiesta/submit', function (Illuminate\Http\Request $request) {
        if (Auth::check() && !Auth::user()->reviewer) {
            return app(PublicController::class)->invia_Richiesta_submit($request);
        } else {
            return redirect('/');
        }
    })->name('reviewer.submit');

    // Route::post('/richieste/submit', [PublicController::class, 'invia_Richiesta_submit'])->name('reviewer.submit');
    
    // accettazione/declino annuncio
        Route::post('/advertise/accetta/{advertise}', function (App\Models\Advertise $advertise) {
            if (Auth::check() && Auth::user()->reviewer) {
                return app(ReviewerController::class)->accetta($advertise);
            } else {
                return redirect('/');
            }
        })->name('reviewer.accetta');
        
        Route::post('/advertise/declina/{advertise}', function (App\Models\Advertise $advertise) {
            if (Auth::check() && Auth::user()->reviewer) {
                return app(ReviewerController::class)->declina($advertise);
            } else {
                return redirect('/');
            }
        })->name('reviewer.declina');
        
        Route::get('/reviewer/area', function () {
            if (Auth::check() && Auth::user()->reviewer) {
                return app(ReviewerController::class)->reviewerArea();
            } else {
                return redirect('/');
            }
        })->name('reviewer.area');

        Route::get('/reviewer/area/users', function () {
            if (Auth::check() && Auth::user()->reviewer) {
                return app(ReviewerController::class)->reviewerUsers();
            } else {
                return redirect('/');
            }
        })->name('reviewer.users');

        Route::get('/reviewer/area/advertises', function () {
            if (Auth::check() && Auth::user()->reviewer) {
                return app(ReviewerController::class)->reviewerAdvertises();
            } else {
                return redirect('/');
            }
        })->name('reviewer.advertises');

        Route::get('/reviewer/area/declinedAdvertises', function () {
            if (Auth::check() && Auth::user()->reviewer) {
                return app(ReviewerController::class)->delcinedAdvertises();
            } else {
                return redirect('/');
            }
        })->name('reviewer.declinedAdvertises');

        Route::post('/advertise/reset/{advertise}', function (App\Models\Advertise $advertise) {
            if (Auth::check() && Auth::user()->reviewer) {
                return app(ReviewerController::class)->reset($advertise);
            } else {
                return redirect('/');
            }
        })->name('reviewer.reset');

        Route::post('/advertise/delete/{advertise}', function (App\Models\Advertise $advertise) {
            if (Auth::check() && Auth::user()->reviewer) {
                return app(ReviewerController::class)->delete($advertise);
            } else {
                return redirect('/');
            }
        })->name('reviewer.delete');
});

Route::get('/advertise/index', [AdvertiseController::class, 'index'])->name('advertise.index');
Route::get('/advertise/{advertise}', [AdvertiseController::class, 'show'])->name('advertise.show');
Route::get('/advertise/category/{advertise}', [AdvertiseController::class, 'category'])->name('advertise.category');