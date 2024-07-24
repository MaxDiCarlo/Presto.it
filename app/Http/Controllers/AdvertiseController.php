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
        $advertises = Advertise::where('pending', false)
                                ->where('declined', false)
                                ->where('category_id', $category->id)->latest()->paginate(6);
                                
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
     * Remove the specified resource from storage.
     */
    public function destroy(Advertise $advertise)
    {
        $images = Image::where('advertise_id', $advertise->id)->get();
        foreach($images as $image){
            $image->delete();
        }

        $advertise->delete();
        return redirect(route('homepage'))->with('message', 'Annuncio cancellato con successo');
    }

    public function search(Request $request) {
        $stringa = strtolower($request->input('stringa', ''));
    
        $query = Advertise::where('pending', false)
                          ->where('declined', false)
                          ->where(function ($query) use ($stringa) {
                              $query->where('title', 'LIKE', "%{$stringa}%")
                                    ->orWhere('description', 'LIKE', "%{$stringa}%");
    
                              $category = Category::where('name', 'LIKE', "%{$stringa}%")->first();
                              if ($category) {
                                  $query->orWhere('category_id', $category->id);
                              }
                          });
    
        $advertises = $query->latest()->paginate(6)->appends(['stringa' => $stringa]);
    
        return view('advertise.index', compact('advertises'));
    }

}
