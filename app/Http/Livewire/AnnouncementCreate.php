<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcement;

class AnnouncementCreate extends Component
{
    public $title;
    public $price;
    public $body;

    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:8',
        'price' => 'required|numeric',
    ];

    protected $messages=[
        'required'=>'Il campo :attribute è richiesto',
        'min'=>'Il campo :attribute è troppo corto',
        'numeric'=>'Il campo :attribute dev\'essere un numero'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function announcementCreate() {

        $validatedData = $this->validate();

        Announcement::create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price
        ]);
        session()->flash('message','Annuncio inserito con successo');
        $this->cleanForm();
    }
    protected function cleanForm() {
        $this->title='';
        $this->body='';
        $this->price='';
    }

    public function render()
    {
        return view('livewire.announcement-create');
    }
}
