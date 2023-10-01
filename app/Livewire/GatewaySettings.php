<?php

namespace App\Livewire;

use App\Enums\GatewayMessageType;
use App\Models\Gateway;
use App\Models\GatewayMessage;
use Livewire\Attributes\Modelable;
use Livewire\Component;

class GatewaySettings extends Component
{

    public function render()
    {
        return view('livewire.gateway-settings');
    }
}
