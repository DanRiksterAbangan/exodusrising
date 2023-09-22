<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class PasswordRequest extends Component
{
    public $email;
    protected $rules =[
        "email"=>"required|email"
    ];

    public function submit(){
        $this->validate();
        $user = User::where("email",$this->email)->first();
        if($user){
            $status = Password::sendResetLink(
               ['email'=>$this->email]
            );
            dd($status);
            $user->sendPasswordResetNotification($user->createToken("password-reset")->plainTextToken);
            session()->flash("success","Password reset link has been sent to your email");
        }else{
            session()->flash("warning","Email not found");
        }
    }

    public function render()
    {
        return view('livewire.password-request');
    }
}
