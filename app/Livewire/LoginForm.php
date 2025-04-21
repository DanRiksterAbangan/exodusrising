<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        $user = User::where("login_id",$this->username)->first();
        if($user){
            if($user->login_pw == md5($this->password)){
                Auth::login($user);
                return redirect()->route("account");
            }
        }

        return session()->flash("message","Invalid credentials");

    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
