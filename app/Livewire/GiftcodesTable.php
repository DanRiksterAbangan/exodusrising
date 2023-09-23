<?php

namespace App\Livewire;

use App\Models\GiftCode;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class GiftcodesTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = "";
    public $limit = 20;
    private $giftcodes = [];

    protected $queryString = ['search' => ['except'=>''],'limit','page' => ['except' => 1]];



    public function mount(){
        $this->giftcodesData();
     }

     public function searchData(){
         $this->giftcodesData();
     }

     public function giftcodesData(){
        $this->giftcodes = GiftCode::with("claimedBy", "createdBy")->where(function ($q) {
            $q->where("code", "like", "%" . $this->search . "%");
            })->latest("id")->paginate($this->limit);
    }

    public function deleteGiftCode($id){
        $user = auth()->user();
        $gc = GiftCode::where("id", $id)->first();
        if($gc && $gc->claimed_by != null){
            $this->dispatch("alert", ["type"=>"error", "message"=>"Gift code already claimed"]);
            return;
        }
        $gc->delete();
        $this->dispatch("alert", ["type"=>"success", "message"=>"Gift code deleted"]);
    }
    public function render()
    {
        $this->giftcodesData();
        return view('livewire.admin.giftcodes-table',[
            "giftcodes"=>$this->giftcodes
        ]);
    }
}
