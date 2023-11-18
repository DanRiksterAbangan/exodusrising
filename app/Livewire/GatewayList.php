<?php

namespace App\Livewire;

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
    }
    public function render()
    {
        return view('livewire.gateway-list',[
            'gateways' => Gateway::all()
        ]);
    }
}
