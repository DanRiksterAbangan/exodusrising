<?php

namespace App\Livewire\Gatewaysettings;

use App\Enums\GatewayUpdateType;
use App\Models\Gateway;
use App\Models\GatewayFirecracker;
use Livewire\Component;

class GatewayFirecrackerReward extends Component
{
    public $firecracker_type;
    public $reward_type;
    public $stack;
    public $stats = "0x00";
    public $description;

    public function addFirecracker(){
        GatewayFirecracker::create([
            'firecracker_type' => $this->firecracker_type,
            'reward_type' => $this->reward_type,
            'stack' => $this->stack,
            'stats' => $this->stats,
            'description' => $this->description
        ]);
        $this->sendUpdateToGateway();
    }
    public function remove($id){
        GatewayFirecracker::find($id)->delete();
        $this->sendUpdateToGateway();
    }

    public function sendUpdateToGateway(){
        Gateway::where("status","online")->update([
            'setting_update' => GatewayUpdateType::UpdateFirecracker,
        ]);
    }
    public function render()
    {


        return view('livewire.gatewaysettings.gateway-firecracker-reward',[
            'firecrackers' => GatewayFirecracker::all()
        ]);
    }
}
