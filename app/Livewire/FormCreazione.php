<?php

namespace App\Livewire;

use App\Jobs\ResizeImage;
use Livewire\Component;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\File;
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
    }

    protected function cleanForm(){
            $this->title = '';
            $this->description = '';
            $this->category = '';
            $this->price = '';
            $this->images = [];
    }
   
    public function storeAdvertise(){
        // validazione
        $this->validate();
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

        if(count($this->images) > 0){
            foreach($this->images as $image){
                $newFileName = "advertises/{$advertise->id}";
                $newImage = $advertise->images()->create(['path' => $image->store($newFileName, 'public')]);
                dispatch(new ResizeImage($newImage->path, 400, 400));
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
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