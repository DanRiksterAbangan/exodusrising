<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use Livewire\Component;

class Itemmall extends Component
{
    public $categories;
    public $category = "all";
    public $items = [];
    public $search = "";
    public $page = 1;
    public $pageCount = 10;
    public $quantity = 1;
    public function mount()
    {
        $tcat = [
            "Etc",
            "Option Stone",
            "Forging Stone",
            "Costume",
            "Talisman",
            "Scroll",
            "Exp Scroll",
            "Pet",
            "VIP"
        ];
        sort($tcat);
        $this->categories = $tcat;
    }



    public function render()
    {
        $this->items = Item::where(function($q){
            $q->where("name","like","%".($this->search ?? "")."%")->orWhere("description","like","%".($this->search ?? "")."%");
        });
        if(strtolower($this->category ?? "all") == "all"){
            $this->items = $this->items->offset(($this->page - 1) * $this->pageCount)->limit($this->pageCount)->get();
        }else{
            $this->items = $this->items->where("category",$this->category)->offset(($this->page - 1) * $this->pageCount)->limit($this->pageCount)->get();
        }

        return view('livewire.itemmall',[
            'items'=>$this->items
        ]);
    }

    public function buyItem($id){


        $item = Item::where("id",$id)->first();
        if($item){
            $user = User::where("user_id",auth()->user()->user_id)->first();
            $amountToDeduct =  $item->amount * $this->quantity;
            $amountToDeduct = $amountToDeduct - ($amountToDeduct * ($item->discount / 100));
            if($user->Point >= $amountToDeduct){
                $user->decrement("Point", $amountToDeduct);
                for($i = 1; $i <= $this->quantity; $i++){
                    $user->mallItems()->create([
                        'type' => $item->type,
                        'attr' => 0x0,
                        'stack' => $item->stack,
                        'rank' => 0,
                        'equip_level' => 0,
                        'equip_strength' => 0,
                        'equip_dexterity' => 0,
                        'equip_intelligence' => 0,
                        'date' => now(),
                    ]);
                }
                $this->dispatch("updatedUser",$user);
                return $this->emit("buy_response",[
                   "success"=>true,
                   "message"=>"You have successfully bought ".$this->quantity."x ".$item->name
               ]);

            }else{
                return $this->emit("buy_response",[
                    "success"=>false,
                    "message"=>"You don't have enough points to buy this item"
                ]);
            }
        }
        return $this->emit("buy_response",[
            "success"=>false,
            "message"=>"Item not found"
        ]);

    }




}
