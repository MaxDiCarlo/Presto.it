<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Validate;

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
    #[Validate('required', message:'La categoria è obbligatorio')]
    public $category;

    public function render()
    {
        $categories = Category::all();
        return view('livewire.form-creazione', compact('categories'));
    }

    public function store(){
        // dd($this->category, $this->title, $this->price, $this->description);
        $this->validate();
        
    }

}
