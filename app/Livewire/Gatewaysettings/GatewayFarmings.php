<?php

namespace App\Livewire\Gatewaysettings;

use App\Enums\GatewayUpdateType;
use App\Models\Gateway;
use App\Models\GatewayFarming;
use Livewire\Component;

class GatewayFarmings extends Component
{
    public $farming;
    public function mount(){
        $farming = GatewayFarming::first();
        if($farming){
            $this->farming = $farming->toArray();
        }else{
            $this->farming = GatewayFarming::create([])->toArray();
        }
    }

    public function saveFarming(){
        $farming = GatewayFarming::where("id", $this->farming["id"])->first();
        $farming->update($this->farming);
        $this->sendUpdateToGateway();
        $this->dispatch("alert", ["type" => "success", "message" => "Farming settings updated."]);
    }

    public function sendUpdateToGateway(){
        Gateway::where("status","online")->update([
            'setting_update' => GatewayUpdateType::UpdateFarming,
        ]);
    }
    public function render()
    {
        return view('livewire.gatewaysettings.gateway-farmings');
    }
}
