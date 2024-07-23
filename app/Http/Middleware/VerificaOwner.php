<?php

namespace App\Http\Middleware;

use App\Models\Advertise;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificaOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ottieni l'annuncio usando il parametro dalla rotta
        // Ottieni l'ID dell'annuncio dal parametro della rotta
        $advertise = $request->route('advertise');

        // Trova l'annuncio usando l'ID
        $advertise = Advertise::where('id', $advertise->id)->first();

        // Verifica se l'annuncio esiste
        if (!$advertise) {
            return redirect(route('homepage'));
        }

        // Verifica se l'utente autenticato è il proprietario dell'annuncio
        if (Auth::user()->id !== $advertise->user_id) {
            return redirect(route('homepage'));
        }

        return $next($request);
    }
}