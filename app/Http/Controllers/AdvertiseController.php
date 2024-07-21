<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertises=Advertise::where('pending', false)->where('declined', false)->latest()->paginate(6);
        return view('advertise.index', compact('advertises'));
    }

    public function indexCategory(Category $category){
        // dd($category->id);
        $advertises = Advertise::where('category_id', $category->id)->latest()->paginate(6);
        return view('advertise.index', compact('advertises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('advertise.create');
    }
    /**
     * Display the specified resource.
     */
    public function show(Advertise $advertise)
    {
        $images = Image::where('advertise_id', $advertise->id)->latest()->take(4)->get();
        return view('advertise.show', compact('advertise', 'images'));
    }

    public function category(Advertise $advertise)
    {
        $advertises = Advertise::where('category_id', $advertise->category_id)->get();
        return view('advertise.index', compact('advertises'));
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

    public function search(Request $request){
        $stringa = strtolower($request->stringa);
        $category = Category::where('name', 'LIKE', "%{$stringa}%")->first();

        if($category){
            $category_id = $category->id;
            $allAdvertises = Advertise::where('title', 'LIKE', "%{$stringa}%")
            ->orWhere('description', 'LIKE', "%{$stringa}%")
            ->orWhere('category_id', 'LIKE', "%{$category_id}%")
            ->latest()->paginate(6);
        } else {
            $allAdvertises = Advertise::where('title', 'LIKE', "%{$stringa}%")
            ->orWhere('description', 'LIKE', "%{$stringa}%")
            ->latest()->paginate(6);
        }
        
        return view('advertise.index', ['advertises' => $allAdvertises]);
    }
}
