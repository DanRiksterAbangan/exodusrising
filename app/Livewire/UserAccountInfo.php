<?php

namespace App\Livewire;

use Livewire\Component;

class UserAccountInfo extends Component
{

    public $user;
    public function mount($user)
    {
        $this->user = $user;
    }

    public function fix5101(){
        $this->user->disconnect()->create([
            "server_id" => 1,
            "char_id" => 0,
        ]);
        $this->dispatch("alert",["message" => "Fixed 5101","type" => "success"]);
    }

    public function render()
    {
        return view('livewire.user-account-info');
    }
}
