<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegisterForm extends Component
{
    public $name;
    public $email;
    public $username;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/u',
        'email' => 'required|email',
        'username' => 'required',
        'password' => 'required|confirmed',
    ];

    public function submit(){
        $this->validate();
        $user = User::where("login_id",$this->username)->first();
        if($user){
            session()->flash("message", "Already registered");
            return redirect()->route("register");
        }
        $user = User::create([
            "name" => $this->name,
            "email" => $this->email,
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
