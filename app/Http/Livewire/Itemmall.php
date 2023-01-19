<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Illuminate\Support\Facades\Event;
use Livewire\Component;

class Itemmall extends Component
{
    public $categories;
    public $category = "all";
    public $items = [];
    public $search = "";
    public $page = 1;
    public $pageCount = 10;
    public function mount()
    {
        $tcat = [
            "Etc",
            "Option Stone",
            "Forging Stone",
            "Costume",
            "Talisman",
            "Scroll",
            "Exp Scroll",
            "Pet",
            "VIP"
        ];
        sort($tcat);
        $this->categories = $tcat;
    }

    public function render()
    {
        $this->items = Item::where(function($q){
            $q->where("name","like","%".($this->search ?? "")."%")->orWhere("description","like","%".($this->search ?? "")."%");
        });
        if(strtolower($this->category ?? "all") == "all"){
            $this->items = $this->items->offset(($this->page - 1) * $this->pageCount)->limit($this->pageCount)->get();
        }else{
            $this->items = $this->items->where("category",$this->category)->offset(($this->page - 1) * $this->pageCount)->limit($this->pageCount)->get();
        }

        return view('livewire.itemmall',[
            'items'=>$this->items
        ]);
    }




}
