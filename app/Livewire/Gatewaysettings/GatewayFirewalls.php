<?php

namespace App\Livewire\Gatewaysettings;

use App\Enums\GatewayUpdateType;
use App\Models\Gateway;
use App\Models\GatewayFirewall;
use Livewire\Component;

class GatewayFirewalls extends Component
{

    public $packet_type;
    public $packet_rule = 'block';

    public $ruletypes = [
        'block' => 'Block',
        'block-disconnect' => 'Block Disconnect',
        'except' => 'Except Log',
        'except-unmatch' => 'Except Unmatch Packet',
    ];

    public function addRule(){
        $this->validate([
            'packet_type' => 'required',
            'packet_rule' => 'required',
        ]);
        $data = [
            'packet_type' => $this->packet_type,
            'packet_rule' => $this->packet_rule,
        ];
        GatewayFirewall::create($data);
        $this->reset();
        $this->sendUpdateToGateway();
    }

    public function deleteRule($id){
        GatewayFirewall::find($id)->delete();
        $this->sendUpdateToGateway();
    }

    public function sendUpdateToGateway(){
        Gateway::where("status","online")->update([
            'setting_update' => GatewayUpdateType::UpdateFirewall,
        ]);
    }
    public function render()
    {
        return view('livewire.gatewaysettings.gateway-firewalls',[
            'rules' => GatewayFirewall::latest("id")->get()
        ]);
    }
}
