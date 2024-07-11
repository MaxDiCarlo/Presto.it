<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewerController extends Controller
{
    public function richiesta(){
        return view('reviewer.richiesta');
    }

    
}
