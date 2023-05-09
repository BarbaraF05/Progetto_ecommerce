<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcement;

class AnnouncementCreate extends Component
{
    public $title;
    public $price;
    public $body;

    public function announcementCreate() {
        Announcement::create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price
        ]);
        $this->clearForm();
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
