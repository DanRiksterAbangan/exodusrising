<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegisterForm extends Component
{
    public $username;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'username' => 'required',
        'password' => 'required|confirmed',
    ];

    public function submit(){
        $this->validate();
        $user = User::where("login_id",$this->username)->first();
        if($user){
            return session()->flash("message","Already registered");
        }
        $user = User::create([
            "login_id" => $this->username,
            "login_pw" => md5($this->password),
            "login_pw2" => $this->password,
        ]);
        Auth::login($user);
        return redirect()->route("home");
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
