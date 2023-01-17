<?php

namespace App\Http\Livewire;

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
                $loggedin = Auth::login($user);
                session()->flash('message', $loggedin  ? "LOGIN $loggedin" : "AWDAWD11 $loggedin");
            }
        }

    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
