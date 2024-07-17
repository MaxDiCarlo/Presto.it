<?php

namespace App\Livewire;

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
    public $images=[];
    public $temporary_images;


    public function updatedTemporaryImages(){
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
            'temporary_images' => 'max:6',
        ]))
        {
             foreach ($this->temporary_images as $image) {
                 $this->images[] = $image;
             }
        };
        
    }

    public function removeImage($key){
        if (in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
        $this->cleanImages();
    }

    protected function cleanImages(){
            $this->images = [];
            $this->temporary_images = null;
    }
   
    public function storeAdvertise(){
        // validazione
        $this->validate();
        dd($this->img);
        $category = Category::where('id', $this->category)->first();
        if(Auth::user()->reviewer){
            $advertise = Auth::user()->advertises()->create([
                'title' => $this->title,
                'price' => $this->price,
                'description' => $this->description,
                'category_id' => $category->id,
                'pending' => false
            ]);
        } else {
            $advertise = Auth::user()->advertises()->create([
                'title' => $this->title,
                'price' => $this->price,
                'description' => $this->description,
                'category_id' => $category->id
            ]);
        }

        
        if(Auth::user()->reviewer){
            return redirect(route('reviewer.area'))->with('message', 'Annuncio postato');
        } else {
            return redirect(route('homepage'))->with('message', 'annuncio mandato in elaborazione');
        }
    }
    
    public function render()
    {
        $categories = Category::all();
        return view('livewire.form-creazione', compact('categories'));
    }
    
}