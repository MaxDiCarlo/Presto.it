<?php

namespace App\Livewire;

use session;
use Livewire\Component;
use App\Models\Category;
use App\Models\Image;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class FormCreazione extends Component
{
    use WithFileUploads;
    
    #[Validate('required', message:'Il titolo è obbligatorio')]
    public $title;
    #[Validate('required', message:'Il prezzo è obbligatorio')]
    public $price;
    #[Validate('required', message:'La descrizione è obbligatorio')]
    public $description;
    #[Validate('required', message:'La categoria è obbligatoria')]
    public $category;
    #[Validate('required', message:'Almeno un immagine è obbligatoria')]
    public $img = [];

    // blocco di codice per aggiunta degli imput
    public $inputCount = 1;

    public function addInput()
    {
        $this->inputCount++;
    }
    // fine blocco di codice per aggiunta degli imput
    
    public function store(){
        // validazione
        $this->validate();
        $category = Category::where('id', $this->category)->first();
        $advertise = Auth::user()->advertises()->create([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'category_id' => $category->id
        ]);

        foreach($this->img as $img){
            if($img){
                $img = $img->store('public/advertises');
                Image::create([
                    'img' => $img,
                    'advertise_id' => $advertise->id
                ]);
            }
        }
        
        return redirect(route('homepage'))->with('message', 'annuncio mandato in elaborazione');
    }
    
    // funzione per la sincronizzazione dei nuovi componenti livewire 
    // creati dinamicamente con js
    public function rescan()
    {
        $this->dispatchBrowserEvent('rescan');
    }
    
    public function render()
    {
        $categories = Category::all();
        return view('livewire.form-creazione', compact('categories'));
    }
    
    
}
