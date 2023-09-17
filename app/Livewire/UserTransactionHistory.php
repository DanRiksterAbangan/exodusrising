<?php

namespace App\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class UserTransactionHistory extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = "";
    public $limit = 20;

    public $page = 1;
    protected $queryString = ['search','limit','page'];

    public $user;

    public function mount($user){
        $this->user = $user ? $user : auth()->user();
        $this->search = request()->query("search","");
        $this->limit = (int)request()->query("limit",20);
        $this->page = (int)(request()->query("page",1));
        $this->transactionData();
    }
    public function searchData(){
        $this->page = 1;
        $this->transactionData();
    }



    public function transactionData(){
        return $this->user->transactions()->with("item")->where(function ($q) {
            $q->where("amount", "like", "%" . $this->search . "%")
                ->orWhere("item_type", "like", "%$this->search%")->orWhereHas("item", function ($q) {
                    $q->where("name", "like", "%" . $this->search . "%");
                });

        })->paginate($this->limit);
    }

    public function render()
    {
        $transactions = $this->transactionData();
        return view('livewire.user-transaction-history',compact("transactions"));
    }
}
