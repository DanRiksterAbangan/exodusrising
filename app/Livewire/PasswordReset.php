<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class PasswordReset extends Component
{
    public $email;
    public $password;
    public $password_confirmation;
    public $token;

    protected $rules = [
        "token" => "required",
        "email"=>"required|email",
        "password"=>"required|confirmed|min:8"
    ];
    public function mount(){
        $this->email = request()->email;
        $this->token = request()->token;
    }

    public function submit(){
        $this->validate();
        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function ($user, $password) {
                $user->forceFill([
                    'login_pw' => md5($password),
                ]);
                $user->save();
            }
        );
       return $status === Password::PASSWORD_RESET
        ? $this->dispatch("alert",["type"=>"success","message"=>"Password reset successfully"])
        : $this->dispatch("alert",["type"=>"warning","message"=> __($status)]);
    }
    public function render()
    {
        return view('livewire.password-reset');
    }
}
