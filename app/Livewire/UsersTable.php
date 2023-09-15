<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class UsersTable extends Component
{

    public $search = "";
    public $limit = 50;

    public $page = 1;
    protected $queryString = ['search','limit','page'];
    public $users = [];
    public $userCount = 0;

    public function mount(){
        $this->search = request()->query("search","");
        $this->limit = (int)request()->query("limit",50);
        $this->page = (int)(request()->query("page",1));
        $this->userData();
    }

    public function searchData(){
        $this->page = 1;
        $this->userData();
    }

    public function nextPage(){
        if ($this->page < ceil($this->userCount / $this->limit)) {
            $this->page++;
            $this->userData();
        }
    }

    public function prevPage(){
        if ($this->page > 1) {
            $this->page--;
            $this->userData();
        }
    }
    public function userData(){

        is_integer($this->limit) || $this->limit = 50;
        is_integer($this->page) || $this->page = 1;

        $data = Cache::remember("users-{$this->search}-{$this->limit}-{$this->page}", 60, function () {
            $users = User::with("characters")->where(function ($q) {
                $q->where("user_id", "like", "%" . $this->search . "%")
                    ->orWhere("Point", "like", "%$this->search%")
                    ->orWhere("login_id", "like", "%" . $this->search . "%")
                    ->orWhere("grade", "like", "%" . $this->search . "%");

            });
            $usersCount = $users->count();
            $users = $users->offset(($this->page - 1) * $this->limit)->limit($this->limit)->get();
            return [
                "users" => $users,
                "usersCount" => $usersCount
            ];
        });
        $this->userCount = $data["usersCount"];
        $this->users = $data["users"];

    }

    public function render()
    {
        return view('livewire.users-table');
    }
}
