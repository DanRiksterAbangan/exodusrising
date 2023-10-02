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
       GatewayForging::upsert([
        ...$rareweapons,
        ...$uniqueweapons,
        ...$ancientweapons,
        ...$rareshields,
        ...$uniqueshields,
        ...$ancientshields,
        ...$rarearmors,
        ...$uniquearmors,
        ...$ancientarmors
       ],['main_category','category'],['item_type']);
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
        return view('livewire.gatewaysettings.gateway-forgings');
    }
}
