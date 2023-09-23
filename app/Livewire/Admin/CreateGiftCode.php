<?php

namespace App\Livewire\Admin;

use App\Models\GiftCode;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateGiftCode extends Component
{


    public $gcamount;
    public $gcdescription = "";

    public $gcdays = 1;
    protected $rules = [
        'gcamount' => 'required|numeric|min:100',
        'gcdescription' => 'required|string|min:1',
        'gcdays' => 'required|numeric|min:1',
    ];

    public function createGiftCode(){

        $user = auth()->user();
        if($user->cannot("create", GiftCode::class)){
            $this->dispatch("alert", ["type"=>"error", "message"=>"You are not allowed to create gift codes"]);
            return;
        }

        $this->validate();
        $user->createdGiftCodes()->create([
            "code"=> "GC-R".time(),
            "rps_amount"=>$this->gcamount,
            "description"=>$this->gcdescription,
            "expired_at" => Carbon::now()->addDays($this->gcdays),
            'status' => 'active'
        ]);
        $this->reset();
        $this->dispatch("alert", ["type"=>"success", "message"=>"Gift code created",'create'=>true]);
    }


    public function render()
    {
        return view('livewire.admin.create-gift-code');
    }
}
