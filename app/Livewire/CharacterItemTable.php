<?php

namespace App\Livewire;

use App\Enums\ItemStats;
use App\Models\CharacterItem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
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

    public $itemStatsList = [];

    public $searchStat = [];
    protected $queryString = ['searchStat','itemTypeSearch','equipLevelSearch','equipStrSearch','equipDexSearch','equipIntSearch','stackSearch','charNameSearch','userIdSearch','limit','page'];


    public function mount(){

        $this->itemStatsList = ItemStats::getKeys();
        $this->limit = (int)request()->query("limit",50);
        $this->page = (int)(request()->query("page",1));
        $this->searchData();
    }

    public function clearStat($stat){
        foreach ($this->searchStat as $key => $item) {
            if ($item['name'] === $stat['name']) {
                unset($this->searchStat[$key]);
            }
        }

        // Re-index the array if needed
        $this->searchStat = array_values($this->searchStat);
        $this->searchData();

    }

    public function searchData($stats = []){
        $nstats = [];

        if(count($stats)){
            $this->searchStat = $stats;
            $nstats = collect($stats)->filter(fn($item) => isset($item['value']) && $item['value'] != "0" && $item['value'] != "")->map(function($item){
                $binaryString = pack('v', $item['value']);
                $hexadecimal = bin2hex($binaryString);
                return [
                    "value" => $hexadecimal,
                    "name" => ItemStats::getValue($item['name'])
                ];
            });
        }

        is_integer($this->limit) || $this->limit = 50;
        is_integer($this->page) || $this->page = 1;
        // ,DB::raw("CONVERT(NVARCHAR(MAX), attr, 2) as attr2"),DB::raw("SUBSTRING(CONVERT(NVARCHAR(MAX), attr, 2), 0, 6) as attr1")
            $items = CharacterItem::select(["dbo.titem.*"])->with(["character", 'user'])->where(function ($q) {
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
            })->where(function ($query)use($nstats) {
                for ($x = 0; $x < count($nstats);$x++){
                $query->where(function ($q) use ($nstats, $x) {
                    for ($i = 0; $i < 42; $i += ($i == 0 ? 7 : 6)) {
                        $q->orWhere(function ($q) use ($nstats, $x, $i) {
                                $q->whereRaw("SUBSTRING(CONVERT(NVARCHAR(MAX), attr, 2), $i, ".($i == 0 ? "7" : "6").") = ?", [$nstats[$x]['name'].$nstats[$x]['value']]);
                            });
                        }
                });

                }
            })
            ->whereHas("character",function($q){
                $q->where("name", "like", "%" . $this->charNameSearch . "%");
            });
            $this->itemCount  = $items->count();
            $this->items  = $items->offset(($this->page - 1) * $this->limit)->limit($this->limit)->get();
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
