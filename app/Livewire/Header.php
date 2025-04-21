<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Header extends Component
{

   public $user = null;
   public $cart_count = 0;

   public function mount(){
    $this->user = User::with("carts")->whereUserId(auth()->user()->user_id)->first();
    $this->cart_count = $this->user->carts->count();
   }


    public function render()
    {
        return view('livewire.header');
    }
}
