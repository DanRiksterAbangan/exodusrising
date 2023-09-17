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

    public $page = 1;
    protected $queryString = ['search','limit','page'];

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

    public function userData(){
        return User::with("characters")->where(function ($q) {
                $q->where("user_id", "like", "%" . $this->search . "%")
                    ->orWhere("Point", "like", "%$this->search%")
                    ->orWhere("login_id", "like", "%" . $this->search . "%")
                    ->orWhere("grade", "like", "%" . $this->search . "%");

            })->paginate($this->limit);
    }

    public function render()
    {
        $users = $this->userData();
        return view('livewire.users-table',compact('users'));
    }
}
