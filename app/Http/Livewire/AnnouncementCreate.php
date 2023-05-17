<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class AnnouncementCreate extends Component
{
    use WithFileUploads;

    public $title;
    public $price;
    public $body;
    public $category;
    public $temporary_images = [];
    public $images = [];
    public $announcement;

    protected $rules = [
        'title' => 'required|min:2',
        'body' => 'required|min:4',
        'price' => 'required|numeric|digits_between:0,8',
        'category'=>'required',
        'images.*'=>'image',
        'temporary_images.*'=>'image',
    ];

    protected $messages=[
        'required'=>'Il campo :attribute è richiesto',
        'min'=>'Il campo :attribute è troppo corto',
        'numeric'=>'Il campo :attribute dev\'essere un numero',
        'digits_between'=>'Il campo :attribute può contenere al massimo 8 cifre',
        'images.image'=>"L'immagine deve essere una immagine",
        'temporary_images.required'=>"L'immagine è richiesta",
        'temporary_images.*.image'=>"I file devono essere immagini",

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function announcementCreate() {

        $validatedData = $this->validate();

        $category = Category::find($this->category);
        $announcement = $category->announcements()->create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price
        ]);
        if (count($this->images)){
            foreach ($this->images as $image){
                $announcement->images()->create(['path'=>$image->store('images','public')]);
            }
        }
        
            Auth::user()->announcements()->save($announcement);

        session()->flash('message','Il tuo annuncio è in revisione');
        $this->cleanForm();
    }
    protected function cleanForm() {
        $this->title='';
        $this->body='';
        $this->price='';
        $this->category='';
        $this->images = [];
        $this->temporary_images =[];
    }

    // funzione per le immagini
    public function updatedTemporaryImages(){ 
        if ($this->validate([
            'temporary_images.*'=>'image',
        ])) {
        foreach ($this->temporary_images as $image){
            $this->images[] = $image;
        }
        }
    }

    public function removeImage($key){   
        if (in_array($key, array_keys($this->images))) {       
            unset($this->images[$key]);       
        }       
    }


    public function render()
    {
        return view('livewire.announcement-create');
    }

    
    
}
