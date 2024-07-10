<?php

namespace App\Livewire;

use session;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class FormCreazione extends Component
{

    // public $title;
    // public $price;
    // public $description;
    // public $category;
    

    #[Validate('required', message:'Il titolo è obbligatorio')]
    public $title;
    #[Validate('required', message:'Il prezzo è obbligatorio')]
    public $price;
    #[Validate('required', message:'La descrizione è obbligatorio')]
    public $description;
    #[Validate('required', message:'La categoria è obbligatoria')]
    public $category;

    public function store(){
        // dd($this->category, $this->title, $this->price, $this->description);
        $this->validate();
        // session()->flash('success', 'Il tuo articolo è stato creato correttamente');
        // prendo l'id della categoria appartenente
        $category = Category::where('id', $this->category)->first();
       
        // dd($category->id);
        // store dell'Advertise che fa riferimento all'user
        $advertise = Auth::user()->advertises()->create([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'category_id' => $category->id
        ]);

        return redirect(route('homepage'))->with('message', 'annuncio mandato in elaborazione');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.form-creazione', compact('categories'));
    }


}
