<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertises=Advertise::latest()->take(5)->get();
        return view('advertise.index', compact('advertises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('advertise.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Advertise $advertise)
    {

        return view('advertise.show', compact('advertise'));
    }

    public function category(Advertise $advertise)
    {
        $advertises = Advertise::where('category_id', $advertise->category_id)->get();
        return view('advertise.category', compact('advertises'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advertise $advertise)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Advertise $advertise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advertise $advertise)
    {
        $advertise->delete();
        return redirect(route('homepage'))->with('message', 'Annuncio cancellato con successo');
    }
}
