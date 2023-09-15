<?php

namespace App\Livewire;

use Livewire\Component;

class Header extends Component
{

   public $user = null;

   public function mount(){
    $this->user =  auth()->user();
   }

    public function render()
    {
        return view('livewire.header');
    }
}
