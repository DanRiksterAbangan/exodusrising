<?php

namespace App\Livewire\Gatewaysettings;

use App\Enums\GatewayUpdateType;
use App\Models\Gateway;
use App\Models\GatewayForging;
use Livewire\Component;

class GatewayForgings extends Component
{
    public $rareweapons = [];
    public $uniqueweapons = [];
    public $ancientweapons = [];
    public $rareshields = [];
    public $uniqueshields =[];
    public $ancientshields =[];
    public $rarearmors = [];
    public $uniquearmors =[];
    public $ancientarmors =[];


    public function saveForging(){

        $rareweapons = collect(json_decode($this->rareweapons))->map(fn($item) => ['main_category' => 'weapon', 'category' => 'rare', 'item_type' => $item])->toArray();
        $uniqueweapons = collect(json_decode($this->uniqueweapons))->map(fn($item) => ['main_category' => 'weapon', 'category' => 'unique', 'item_type' => $item])->toArray();
        $ancientweapons = collect(json_decode($this->ancientweapons))->map(fn($item) => ['main_category' => 'weapon', 'category' => 'ancient', 'item_type' => $item])->toArray();
        $rareshields = collect(json_decode($this->rareshields))->map(fn($item) => ['main_category' => 'shield', 'category' => 'rare', 'item_type' => $item])->toArray();
        $uniqueshields = collect(json_decode($this->uniqueshields))->map(fn($item) => ['main_category' => 'shield', 'category' => 'unique', 'item_type' => $item])->toArray();
        $ancientshields = collect(json_decode($this->ancientshields))->map(fn($item) => ['main_category' => 'shield', 'category' => 'ancient', 'item_type' => $item])->toArray();
        $rarearmors = collect(json_decode($this->rarearmors))->map(fn($item) => ['main_category' => 'armor', 'category' => 'rare', 'item_type' => $item])->toArray();
        $uniquearmors = collect(json_decode($this->uniquearmors))->map(fn($item) => ['main_category' => 'armor', 'category' => 'unique', 'item_type' => $item])->toArray();
        $ancientarmors = collect(json_decode($this->ancientarmors))->map(fn($item) => ['main_category' => 'armor', 'category' => 'ancient', 'item_type' => $item])->toArray();

        GatewayForging::truncate();
        GatewayForging::insert(array_merge($rareweapons,$uniqueweapons,$ancientweapons,$rareshields,$uniqueshields,$ancientshields,$rarearmors,$uniquearmors,$ancientarmors));
        $this->sendUpdateToGateway();
       $this->dispatch('alert', ['type' => 'success', 'message' => 'Forging settings updated successfully!']);
    }

    public function sendUpdateToGateway(){
        Gateway::where("status","online")->update([
            'setting_update' => GatewayUpdateType::UpdateForging,
        ]);
    }
    public function render()
    {
        $forgings = GatewayForging::all();
        $this->rareweapons = json_encode($forgings->where('main_category','weapon')->where('category','rare')->pluck('item_type')->toArray());
        $this->uniqueweapons = json_encode($forgings->where('main_category','weapon')->where('category','unique')->pluck('item_type')->toArray());
        $this->ancientweapons = json_encode($forgings->where('main_category','weapon')->where('category','ancient')->pluck('item_type')->toArray());
        $this->rareshields = json_encode($forgings->where('main_category','shield')->where('category','rare')->pluck('item_type')->toArray());
        $this->uniqueshields = json_encode($forgings->where('main_category','shield')->where('category','unique')->pluck('item_type')->toArray());
        $this->ancientshields = json_encode($forgings->where('main_category','shield')->where('category','ancient')->pluck('item_type')->toArray());
        $this->rarearmors = json_encode($forgings->where('main_category','armor')->where('category','rare')->pluck('item_type')->toArray());
        $this->uniquearmors = json_encode($forgings->where('main_category','armor')->where('category','unique')->pluck('item_type')->toArray());
        $this->ancientarmors = json_encode($forgings->where('main_category','armor')->where('category','ancient')->pluck('item_type')->toArray());

        return view('livewire.gatewaysettings.gateway-forgings');
    }
}
