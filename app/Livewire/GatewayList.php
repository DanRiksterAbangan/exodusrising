<?php

namespace App\Livewire;

use App\Enums\GatewayUpdateType;
use App\Models\Gateway;
use Livewire\Component;

class GatewayList extends Component
{

    public function shutdownGatway($id){
        $gateway = Gateway::find($id);
        $gateway->status = "offline";
        $gateway->shutdown_signal = true;
        $gateway->save();
    }

    public function showLogs($id,$status){
        $gateway = Gateway::find($id);
        $gateway->show_logs = $status == 1;
        $gateway->save();
        $this->sendUpdateToGateway($gateway->id);
    }

    public function sendUpdateToGateway($id){
        if ($id == null) {
            Gateway::where("status", "online")->update([
                'setting_update' => GatewayUpdateType::UpdateGateway,
            ]);
        }else{
            Gateway::where("id", $id)->where("status","online")->update([
                'setting_update' => GatewayUpdateType::UpdateGateway,
            ]);
        }
    }
    public function render()
    {
        return view('livewire.gateway-list',[
            'gateways' => Gateway::all()
        ]);
    }
}
