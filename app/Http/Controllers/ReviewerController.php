<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewerController extends Controller
{
    public function richiesta(){
        return view('reviewer.richiesta');
    }

    public function send(Request $request){
        // dd($request->all(), Auth::user()->name, Auth::user()->email);

        // da inviare una email
    }

    public function reviewerArea(){
        $advertises = Advertise::where('pending', true)->get();
        return view('reviewer.area', compact('advertises'));
    }

    public function accetta(Advertise $advertise){
        $advertise->update([
            'pending' => false
        ]);
        return redirect(route('reviewer.area'))->with('message', 'Annuncio accettato');
    }

    public function declina(Advertise $advertise){

        return redirect(route('reviewer.area'))->with('message', 'Annuncio declinato');
    }

}

