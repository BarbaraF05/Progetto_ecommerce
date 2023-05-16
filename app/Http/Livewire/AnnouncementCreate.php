<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;

class AnnouncementCreate extends Component
{
    public $title;
    public $price;
    public $body;
    public $category;

    protected $rules = [
        'title' => 'required|min:2',
        'body' => 'required|min:4',
        'price' => 'required|numeric|digits_between:0,8',
        'category'=>'required'
    ];

    protected $messages=[
        'required'=>'Il campo :attribute è richiesto',
        'min'=>'Il campo :attribute è troppo corto',
        'numeric'=>'Il campo :attribute dev\'essere un numero',
        'digits_between'=>'Il campo :attribute può contenere al massimo 8 cifre'
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
            Auth::user()->announcements()->save($announcement);

        session()->flash('message','Il tuo annuncio è in revisione');
        $this->cleanForm();
    }
    protected function cleanForm() {
        $this->title='';
        $this->body='';
        $this->price='';
        $this->category='';
    }

    public function render()
    {
        return view('livewire.announcement-create');
    }
}
