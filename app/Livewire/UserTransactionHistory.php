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
    public $limit = 10;

    protected $queryString = ['search','limit'];

    private $transactions = [];
    public $user;

    public function mount($user){
        $this->user = $user ? $user : auth()->user();
        $this->transactionData();
    }
    public function searchData(){
        $this->transactionData();
    }

    public function transactionData(){
        $this->transactions = $this->user->transactions()->with("item")->where(function ($q) {
            $q->where("amount", "like", "%" . $this->search . "%")
                ->orWhere("item_type", "like", "%$this->search%")->orWhereHas("item", function ($q) {
                    $q->where("name", "like", "%" . $this->search . "%");
                });

        })->paginate($this->limit);
    }

    public function render()
    {
        $this->transactionData();
        return view('livewire.user-transaction-history',[
            "transactions" => $this->transactions
        ]);
    }
}
