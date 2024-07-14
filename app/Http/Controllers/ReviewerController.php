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
        return view('reviewer.area');
    }

    public function reviewerUsers(){

        return view('reviewer.users');
    }

    public function reviewerAdvertises(){

        $advertises = Advertise::where('pending', true)->take(1)->get();
        $number = count(Advertise::where('pending', true)->get());
        return view('reviewer.advertises', compact('advertises', 'number'));
    }

    public function accetta(Advertise $advertise){
        $advertise->update([
            'pending' => false
        ]);
        return redirect(route('reviewer.advertises'))->with('message', 'Annuncio accettato');
    }

    public function declina(Advertise $advertise){

        
        return redirect(route('reviewer.advertises'))->with('message', 'Annuncio declinato');
    }

}

