<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginForm extends Component
{
    public $username;
    public $password;

    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    public function submit(){
        $this->validate();

    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
