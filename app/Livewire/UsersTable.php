<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = "";
    public $limit = 50;

    private $users = [];
    protected $queryString = ['search' => ['except'=>''],'limit','page' => ['except' => 1]];

    public function mount(){
       $this->userData();
    }

    public function searchData(){
        $this->userData();
    }

    public function userData(){
        $this->users = User::with("characters")->where(function ($q) {
                $q->where("user_id", "like", "%" . $this->search . "%")
                    ->orWhere("Point", "like", "%$this->search%")
                    ->orWhere("login_id", "like", "%" . $this->search . "%")
                    ->orWhere("grade", "like", "%" . $this->search . "%");

            })->latest()->paginate($this->limit);
    }

    public function render()
    {
        $this->userData();
        return view('livewire.admin.users-table',[
            "users" => $this->users
        ]);
    }
}
