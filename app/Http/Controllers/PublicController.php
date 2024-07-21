<?php

namespace App\Http\Controllers;

use App\Mail\Richiesta;
use App\Mail\ContactMail;
use App\Models\Advertise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PublicController extends Controller
{
    //
    public function home(){
        $advertises = Advertise::latest()->take(6)->get();
        // $advertises = [];
        return view('welcome', compact('advertises'));
    }

    public function invia_Richiesta_submit(Request $request){
        $email = Auth::user()->email;
        $body = $request->body;
        $name = Auth::user()->name;

        $richiesta = new Richiesta($email, $body, $name);

        Mail::to('admin@mail.it') // a chi devo mandare l'email
            ->send($richiesta); // Cosa devo inviare, cioé quale mail

        //Se il metodo ddella richiesta é di tipo POST devo ritornare un redirect
        // a cui passo una rotta da richiamare
        return redirect()->route('homepage')->with('message', 'Mail inviata correttamente');
    }

    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function team(){
        return view('team.team');
    }

    public function teamDettaglio(){
        return view('team.teamDettaglio');
    }

}
