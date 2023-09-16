<?php

namespace App\Livewire;

use App\Enums\ItemStats;
use App\Models\CharacterItem;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class CharacterItemTable extends Component
{
    public $itemTypeSearch = "";
    public $equipLevelSearch = "";
    public $equipStrSearch = "";
    public $equipDexSearch = "";
    public $equipIntSearch = "";

    public $stackSearch = "";
    public $charNameSearch = "";
    public $userIdSearch = "";


    public $limit = 50;

    public $page = 1;
    public $items = [];
    public $itemCount = 0;
    protected $queryString = ['itemTypeSearch','equipLevelSearch','equipStrSearch','equipDexSearch','equipIntSearch','stackSearch','charNameSearch','userIdSearch','limit','page'];

    public function mount(){
        $this->itemTypeSearch = request()->query("itemTypeSearch","");
        $this->equipLevelSearch = request()->query("equipLevelSearch","");
        $this->equipStrSearch = request()->query("equipStrSearch","");
        $this->equipDexSearch = request()->query("equipDexSearch","");
        $this->equipIntSearch = request()->query("equipIntSearch","");
        $this->stackSearch = request()->query("stackSearch","");
        $this->charNameSearch = request()->query("charNameSearch","");
        $this->userIdSearch = request()->query("userIdSearch","");
        $this->limit = (int)request()->query("limit",50);
        $this->page = (int)(request()->query("page",1));
        $this->searchData();
    }

    public function searchData(){
        is_integer($this->limit) || $this->limit = 50;
        is_integer($this->page) || $this->page = 1;
        $slug = $this->stackSearch ."-".$this->charNameSearch."-".$this->userIdSearch. $this->itemTypeSearch."-".$this->equipLevelSearch."-".$this->equipStrSearch."-".$this->equipDexSearch."-".$this->equipIntSearch."-".$this->limit."-".$this->page;
        $data = Cache::remember("character-items-$slug", 60, function () {

            $items = CharacterItem::with(["character", 'user'])->where(function ($q) {
                $q->where(function ($query) {
                    $query->where("type", "like", "%" . $this->itemTypeSearch. "%");
                    if($this->equipLevelSearch)
                        $query->where("equip_level", $this->equipLevelSearch);
                    if($this->equipStrSearch)
                        $query->where("equip_strength", $this->equipStrSearch);
                    if($this->equipDexSearch)
                        $query->where("equip_dexterity", $this->equipDexSearch);
                    if($this->equipIntSearch)
                        $query->where("equip_intelligence", $this->equipIntSearch);
                })->where(function($q){
                    if($this->stackSearch)
                    $q->where("stack", "like", "%".$this->stackSearch."%");
                    if($this->userIdSearch)
                    $q->where("user_id", "like", "%" . $this->userIdSearch . "%");

              });
            })
            ->whereHas("character",function($q){
                $q->where("name", "like", "%" . $this->charNameSearch . "%");
            });
            $itemCount = $items->count();
            $items = $items->offset(($this->page - 1) * $this->limit)->limit($this->limit)->get();
            return [
                "items" => $items,
                "itemCount" => $itemCount
            ];
        });
        $this->itemCount = $data["itemCount"];
        $this->items = $data["items"];
    }

    public function nextPage(){
        if ($this->page < ceil($this->itemCount / $this->limit)) {
            $this->page++;
            $this->searchData();
        }
    }

    public function prevPage(){
        if ($this->page > 1) {
            $this->page--;
            $this->searchData();
        }
    }

    public function render()
    {
        return view('livewire.character-item-table');
    }

}
