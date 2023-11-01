<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class UserGiftcodeRedeemHistory extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = "";
    public $limit = 10;

    private $giftcodes = [];

    public function mount(){
        $this->giftcodeData();
    }
    public function giftcodeData(){
        $this->giftcodes = auth()->user()->claimedGiftCodes()->with("claimedBy","createdBy")->where(function ($q) {
            $q->where("code", "like", "%" . $this->search . "%");
        })->latest()->paginate($this->limit);
    }

    public function render()
    {
        $this->giftcodeData();
        return view('livewire.user-giftcode-redeem-history',[
            "giftcodes"=>$this->giftcodes
        ]);
    }
}
