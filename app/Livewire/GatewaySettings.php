<?php

namespace App\Livewire;

use App\Enums\GatewayMessageType;
use App\Models\Gateway;
use App\Models\GatewayMessage;
use Livewire\Attributes\Modelable;
use Livewire\Component;

class GatewaySettings extends Component
{

    public $congratulatoryMessage;
    public $newCharacterMessage;
    public $oldCharacterMessage;
    public $messageColor = 2;

    public function boot(){

        $lcon = GatewayMessage::where("type", "level-congratulatory")->first();
        if($lcon){
            $this->congratulatoryMessage = $lcon->toArray();
        }else{
            $this->congratulatoryMessage = GatewayMessage::create([
                "type" => "level-congratulatory",
                "message" => "",
                "message_type" => GatewayMessageType::Blue,
                "enable" => false,
                "args" => "10,20,30,40,50,60,70,80,90,100"
            ])->toArray();
        }

        $nchar = GatewayMessage::where("type", "new-character")->first();
        if($nchar){
            $this->newCharacterMessage = $nchar->toArray();
        }else{
            $this->newCharacterMessage = GatewayMessage::create([
                "type" => "new-character",
                "message" => "",
                "message_type" => GatewayMessageType::Blue,
                "enable" => false
            ])->toArray();
        }


        $ochar = GatewayMessage::where("type", "old-character")->first();
        if($ochar){
            $this->oldCharacterMessage = $ochar->toArray();
        }else{
            $this->oldCharacterMessage = GatewayMessage::create([
                "type" => "old-character",
                "message" => "",
                "message_type" => GatewayMessageType::Blue,
                "enable" => false
            ])->toArray();
        }
    }

    public function saveMessage(){
        $this->updateMessage($this->congratulatoryMessage);
        $this->updateMessage($this->newCharacterMessage);
        $this->updateMessage($this->oldCharacterMessage);
        Gateway::where("status","online")->update([
            "setting_update" => 1
        ]);
    }

    public function updateMessage($message){
        GatewayMessage::where("id",$message['id'])->update([
            "message" => $message['message'],
            "type" => $message['type'],
            "enable" => $message['enable'],
            "message_type" => $this->messageColor,
            "args" => $message['args']
        ]);
    }

    public function render()
    {
        return view('livewire.gateway-settings');
    }
}
