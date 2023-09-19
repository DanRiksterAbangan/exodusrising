<?php

namespace App\Livewire;

use App\Enums\ItemStats;
use App\Models\CharacterItem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CharacterItemTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $itemTypeSearch = "";
    public $equipLevelSearch = "";
    public $equipStrSearch = "";
    public $equipDexSearch = "";
    public $equipIntSearch = "";

    public $stackSearch = "";
    public $charNameSearch = "";
    public $userIdSearch = "";



    public $limit = 50;


    public $itemStatsList = [];

    public $searchStat = [];
    public $searchStatParsed = [];

    private $items = [];
    protected $queryString = ['searchStat','itemTypeSearch','equipLevelSearch','equipStrSearch','equipDexSearch','equipIntSearch','stackSearch','charNameSearch','userIdSearch','limit','page'];


    public function mount(){
        $this->itemStatsList = ItemStats::getKeys();
        $this->itemData();
    }

    public function clearStat($stat){
        foreach ($this->searchStat as $key => $item) {
            if ($item['name'] === $stat['name']) {
                unset($this->searchStat[$key]);
            }
        }

        // Re-index the array if needed
        $this->searchStat = array_values($this->searchStat);
        $this->itemData();

    }

    public function searchData(){

    }

    public function setStats($stats){
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
            $this->searchStatParsed = $nstats;
        }
    }

    public function itemData(){
        // ,DB::raw("CONVERT(NVARCHAR(MAX), attr, 2) as attr2"),DB::raw("SUBSTRING(CONVERT(NVARCHAR(MAX), attr, 2), 0, 6) as attr1")
        $this->items = CharacterItem::select(["dbo.titem.*"])->with(["character", 'user'])->where(function ($q) {
                $q->where(function ($query) {
                    if($this->itemTypeSearch)
                    $query->where("type",  $this->itemTypeSearch);
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

              })->whereHas("character",function($q){
                $q->where("name", "like", "%" . $this->charNameSearch . "%");
            });
            })->where(function ($query) {
                for ($x = 0; $x < count( $this->searchStatParsed);$x++){
                $query->where(function ($q) use (  $x) {
                    for ($i = 0; $i < 42; $i += ($i == 0 ? 7 : 6)) {
                        $q->orWhere(function ($q) use ( $x, $i) {
                                $q->whereRaw("SUBSTRING(CONVERT(NVARCHAR(MAX), attr, 2), $i, ".($i == 0 ? "7" : "6").") = ?", [ $this->searchStatParsed[$x]['name']. $this->searchStatParsed[$x]['value']]);
                            });
                        }
                });

                }
            })
           ->paginate($this->limit);
    }


    public function render()
    {
        $this->itemData();
        return view('livewire.admin.character-item-table',[
            "items" => $this->items
        ]);
    }

}
