<?php

namespace App\Livewire\Admin;

use App\Models\Streamer;
use App\Models\User;
use Livewire\Component;

class SetStreamer extends Component
{

    //streamer

    public $streamerName;
    public $streamerCode;
    public $user;

    public function mount($user){
        $this->user = $user;
    }


    public function setStreamer($userId){
        $this->validate([
            "streamerName" => "required",
            "streamerCode" => "required|unique:streamers,code"
        ]);
        $nuser = User::where("user_id", $userId)->first();
        if($nuser){
            Streamer::create([
                'name' => $this->streamerName,
                'code' => str($this->streamerCode)->upper(),
                'user_id' => $nuser->user_id,
            ]);
            $this->dispatch("alert",[
                "type" => "success",
                "message" => "Streamer set successfully"
            ]);
        }else{
            $this->dispatch("alert",[
                "type" => "error",
                "message" => "User not found"
            ]);
        }
    }
    public function render()
    {
        return view('livewire.admin.set-streamer');
    }
}
