<?php

namespace App\Livewire\Controls;

use App\Models\PlayerConnection;
use Livewire\Component;


class UserConnection extends Component
{

    private $userLogins;
    public $limit = 50;
    public $search;

    public $connectionMessage = "";
    public function mount(){

    }


    public function getUserLogin(){
      $this->userLogins =  PlayerConnection::where(function ($q) {
            $q->where("machine_id", "like", "%$this->search%")
                ->orWhere("login_id", "like", "%$this->search%")
                ->orWhere("character_name", "like", "%$this->search%")
                ->orWhere("remote_address", "like", "%$this->search%");
        })->paginate($this->limit);
    }


    public function render()
    {
        $this->getUserLogin();
        return view('livewire.controls.user-connection',[
            "userLogins"=>$this->userLogins
        ]);
    }
}
