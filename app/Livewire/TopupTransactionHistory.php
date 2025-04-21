<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class TopupTransactionHistory extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = "";
    public $limit = 10;

    protected $queryString = [];

    private $topupTransactions;
    public $user;

    public function mount($user){
        $this->user = $user ? $user : auth()->user();
        $this->topupData();
    }

    public function topupData(){
        $this->topupTransactions = $this->user->topupTransactions()->where(function ($q) {
            $q->where("status", "like", "%" . $this->search . "%")->orWhere("ref_id", "like", "%" . $this->search . "%");
        })
        ->latest()->paginate(10);
    }

    public function render()
    {
        $this->topupData();
        return view('livewire.topup-transaction-history',[
            'topupTransactions' => $this->topupTransactions
        ]);
    }
}
