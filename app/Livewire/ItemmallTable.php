<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use Livewire\Component;
use Livewire\WithPagination;

class ItemmallTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $categories;
    public $category = "all";
    public $search = "";
    public $page = 1;
    public $quantity = 1;
    public $limit = 20;

    private $items = [];

    protected $queryString = ['search'=>['except'=>''],'category','limit','page'=>['except'=>1]];
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

    public function searchData(){
        $this->page = 1;
    }

    public function itemsData(){
        $items = Item::where(function($q){
            $q->where("name","like","%".($this->search ?? "")."%")->orWhere("description","like","%".($this->search ?? "")."%");
        });
        if(strtolower($this->category ?? "all") == "all"){
            $items = $items->paginate($this->limit, ['*'], 'page', $this->page);
        }else{
            $items = $items->where("category",$this->category)->paginate($this->limit, ['*'], 'page', $this->page);
        }
        $this->items = $items;

    }

    public function render()
    {
        $this->itemsData();
        return view('livewire.itemmall-table',[
            "items" => $this->items
        ]);
    }

    public function buyItem($id){
        $item = Item::where("id",$id)->first();
        if($item){
            $user = User::where("user_id",auth()->user()->user_id)->first();
            $amountToDeductOrig =  $item->amount * $this->quantity;
            $amountToDeduct = $amountToDeductOrig - ($amountToDeductOrig * ($item->discount / 100));
            if($user->Point >= $amountToDeduct){
                $from_rps = $user->Point;
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
                $item->transactions()->create([
                    "user_id"=>$user->user_id,
                    "item_type"=>$item->type,
                    "stacks"=>$this->quantity,
                    "amount"=>$amountToDeduct,
                    "original_amount"=>$amountToDeductOrig,
                    "from_rps"=>$from_rps,
                    "to_rps"=>$user->Point,
                    "discount"=>$item->discount,
                ]);

                $this->dispatch("updatedUser",$user);
                return $this->dispatch("buy_response",[
                   "success"=>true,
                   "message"=>"You have successfully bought ".$this->quantity."x ".$item->name
               ]);

            }else{
                return $this->dispatch("buy_response",[
                    "success"=>false,
                    "message"=>"You don't have enough points to buy this item"
                ]);
            }
        }
        return $this->dispatch("buy_response",[
            "success"=>false,
            "message"=>"Item not found"
        ]);

    }
    public function addtocart($item){

        $cartItem = Cart::where("user_id",auth()->user()->user_id)->where("item_id",$item["id"])->first();
        if($cartItem){
            $cartItem->increment("stack");
        }else{
            $cartItem = Cart::create([
                "user_id"=>auth()->user()->user_id,
                "item_id"=>$item["id"],
                "stack"=>1
            ]);
        }
        $this->dispatch("updateCartCount", [
            "count" => $cartItem->user->carts->count()
        ]);
        return $this->dispatch("addtocart",[
            "success"=>true,
            "message"=>$item["name"]." is added to cart"
        ]);
    }


}
