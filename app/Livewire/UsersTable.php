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
    private $users = [];
    protected $queryString = ['search' => ['except'=>''],'limit','page' => ['except' => 1]];

    public function mount(){
       $this->userData();
    }

    public function searchData(){
        $this->page = 1;
    }

    public function userData(){
        $this->users = User::with("characters")->where(function ($q) {
                $q->where("user_id", "like", "%" . $this->search . "%")
                    ->orWhere("Point", "like", "%$this->search%")
                    ->orWhere("login_id", "like", "%" . $this->search . "%")
                    ->orWhere("grade", "like", "%" . $this->search . "%");

            })->paginate($this->limit, ['*'], 'page', $this->page);
    }

    public function render()
    {
        $this->userData();
        return view('livewire.users-table',[
            "users" => $this->users
        ]);
    }
}
