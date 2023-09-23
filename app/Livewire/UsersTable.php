<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = "";
    public $limit = 50;

    public $bannedDays = 1;
    public $bannedReason = "Bad behavior";
    private $users = [];

    protected $queryString = ['search' => ['except'=>''],'limit','page' => ['except' => 1]];

    public function mount(){
       $this->userData();
    }

    public function searchData(){
        $this->userData();
    }


    public function userDisconnect($user){
        $user->disconnect()->create([
            'server_id' => 1,
            'char_id' => 0
        ]);
    }
    public function userData(){
        $this->users = User::with("characters","banned")->where(function ($q) {
                $q->where("user_id", "like", "%" . $this->search . "%")
                    ->orWhere("Point", "like", "%$this->search%")
                    ->orWhere("login_id", "like", "%" . $this->search . "%")
                    ->orWhere("grade", "like", "%" . $this->search . "%");

            })->latest("user_id")->paginate($this->limit);
    }

    // #[On('disconnect-user')]
    public function disconnectUser($userid){
        $nuser = User::where("user_id", $userid)->first();
        if($nuser){
            $this->userDisconnect($nuser);
            $this->dispatch("alert",[
                "type" => "success",
                "message" => "User disconnected successfully"
            ]);
        }else{
            $this->dispatch("alert",[
                "type" => "error",
                "message" => "User not found"
            ]);
        }

    }

    public function banUser($userid){
        $nuser = User::with("banned")->where("user_id", $userid)->first();
        if($nuser){

            if($nuser->isBanned()){
                $this->dispatch("alert",[
                    "type" => "error",
                    "message" => "User already banned"
                ]);
                return;
            }

            $nuser->banned()->create([
                'reason' => $this->bannedReason,
                'until_date' => now()->addDays($this->bannedDays),
                'banned_by' => auth()->user()->user_id
            ]);
            $this->userDisconnect($nuser);

            $this->dispatch("alert",[
                "type" => "success",
                "user_id" => $nuser->user_id,
                "message" => "$nuser->login_id banned successfully."
            ]);
        }else{
            $this->dispatch("alert",[
                "type" => "error",
                "message" => "User not found"
            ]);
        }
    }
    public function releaseUser($userid){
        $nuser = User::where("user_id", $userid)->first();
        if($nuser){

            $banned = $nuser->isBanned();
            if(!$banned){
                $this->dispatch("alert",[
                    "type" => "error",
                    "message" => "User not banned"
                ]);
                return;
            }
            $banned->until_date = now();
            $banned->save();
            $this->dispatch("alert",[
                "type" => "success",
                "user_id" => $nuser->user_id,
                "message" => "$nuser->login_id released successfully."
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
        $this->userData();
        return view('livewire.admin.users-table',[
            "users" => $this->users
        ]);
    }
}
