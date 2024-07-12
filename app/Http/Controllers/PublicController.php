<?php

namespace App\Http\Controllers;

use App\Mail\Richiesta;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    //
    public function home(){
        return view('welcome');
    }

    public function invia_Richiesta(){
        return view('inviaRichiesta');
    }

    public function invia_Richiesta_submit(Request $request){
        $email = Auth::user()->email;
        $body = $request->input('body');

        $richiesta = new Richiesta($email, $body);

        Mail::to('lorenzo@mail.it') // a chi devo mandare l'email
            ->send($richiesta); // Cosa devo inviare, cioé quale mail

        //Se il metodo ddella richiesta é di tipo POST devo ritornare un redirect
        // a cui passo una rotta da richiamare
        return redirect();
    }

}
