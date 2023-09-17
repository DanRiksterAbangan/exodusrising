<?php

namespace App\Livewire\Modal;

use Livewire\Component;

class ResetPassword extends Component
{
    public $old_password = '';
    public $password = '';

    public $password_confirmation = '';

    protected $rules = [
        'old_password' => 'required|string|min:3|max:30',
        'password' => 'required|confirmed|min:3|max:30',
    ];

    public function changePassword(){
        $this->validate();

        $user = auth()->user();
        if($user){
            if($user->login_pw == md5($this->old_password)){
                $user->login_pw = md5($this->password);
                $user->save();
                $this->old_password = '';
                $this->password = '';
                $this->password_confirmation = '';
                return session()->flash("message","Password changed successfully");
            }else{
                return session()->flash("warning","Invalid old password");
            }
        }else{
            return session()->flash("warning","Invalid credentials");
        }
    }

    public function render()
    {
        return view('livewire.modal.reset-password');
    }
}
