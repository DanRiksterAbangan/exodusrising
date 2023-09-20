<?php

namespace App\Livewire;

use App\Models\GiftCode;
use Livewire\Component;

class UserAccountInfo extends Component
{

    public $user;
    public function mount($user)
    {
        $this->user = $user;
    }

    public function fix5101(){
        $this->user->disconnect()->create([
            "server_id" => 1,
            "char_id" => 0,
        ]);
        $this->dispatch("alert",["message" => "Fixed 5101","type" => "success"]);
    }

    public function checkGiftCode($gc){
        return GiftCode::where("code",$gc)->first();

    }

    public function claimGiftCode($gc){
        $giftCode = GiftCode::where("code",$gc['code'])->first();
        if(!$giftCode){
            return [
                'success'=>false,
                'message'=>"Gift Code not found"
            ];
        }
        if($giftCode->status == "claimed"){
            return [
                'success'=>false,
                'message'=>"Gift Code already claimed"
            ];
        }
        if($giftCode->status == "inactive"){
            return [
                'success'=>false,
                'message'=>"Gift Code inactive"
            ];
        }

        $giftCode->claimed_by = $this->user->user_id;
        $giftCode->claimed_at = now();
        $giftCode->status = "claimed";
        $giftCode->save();
        $this->dispatch("updatedUser", $this->user->refresh());
        return [
            'success'=>true,
            'message'=>"Gift Code claimed"
        ];
    }

    public function render()
    {
        return view('livewire.user-account-info');
    }
}
