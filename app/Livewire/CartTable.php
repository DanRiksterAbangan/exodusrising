<?php

namespace App\Livewire;

use App\Models\Cart;
use Exception;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class CartTable extends Component
{

    public $search = "";
    public $page = 1;

    public $limit = 20;
    private $items = [];

    public $itemSelections;

    public $selectAll = true;
    protected $queryString = ['search'=>['except'=>''],'limit','page'=>['except'=>1]];

    public function mount(){
        $this->itemSelections = collect(Cart::all()->pluck("id")->toArray());

    }

    #[Computed]
    public function TotalPrice(){
        return Cart::whereIn("id",$this->itemSelections)->get()->sum("discounted_price");
    }

    #[Computed]
    public function selectedItems(){
        return $this->items->whereIn("id",$this->itemSelections);
    }

    public function updatedSelectAll(){
        if ($this->selectAll) {
            $this->itemSelections = collect(Cart::all()->pluck("id")->toArray());
        }else{
            $this->itemSelections = collect();
        }
    }

    public function searchData(){}


    public function itemsData(){
        $items = Cart::with("item")->where(function ($q) {
            $q->whereHas("item", function ($q) {
                $q->where("name", "like", "%" . ($this->search ?? "") . "%");
            })->orWhereHas("item", function ($q) {
                $q->where("description", "like", "%" . ($this->search ?? "") . "%");
            });
        })->latest()->get();
        $this->items = $items;

    }




    public function removeItem($item){
        $deleteItem = Cart::where("id",$item['id'])->first();
        if ($deleteItem) {
           $deleteItem->delete();
           $this->itemsData();
           $this->dispatch("updateCartCount", [
                "count" => $deleteItem->user->carts->count()
            ]);
        }
    }

    public function toggleItem($item){
        if ($this->itemSelections->contains($item['id'])) {
            $this->itemSelections = $this->itemSelections->reject(function ($m) use ($item) {
                return $m == $item['id'];
            });
        }else{
            $this->itemSelections->push($item['id']);
        }
    }

    public function buyItems(){
        $user = auth()->user();
        $lock = Cache::lock('credits_'.$user->user_Id, 10);

        if($lock->get()){
            try {
                $items = Cart::with("user")->whereIn("id", $this->itemSelections)->get();
                if ($items->count()) {
                    if($user->Point > $this->TotalPrice){
                       $this->itemSelections = collect();
                       $user->decrement("Point", $this->TotalPrice);
                       $this->dispatch("updatedUser",$user);
                       $items->toQuery()->delete();

                       $this->dispatch("buy_response",[
                           "success"=>true,
                           "message"=>"Successfully bought items"
                       ]);

                       $this->dispatch("updateCartCount", [
                        "count" => 0
                    ]);
                    }else{
                        $this->dispatch("buy_response",[
                            "success"=>false,
                            "message"=>"You don't have enough credits to buy these items"
                        ]);
                    }


                }
            }catch(Exception $e){
                $this->dispatch("buy_response",[
                    "success"=>false,
                    "message"=> $e->getMessage()
                ]);
            }
            $lock->release();
        }

    }

    public function render()
    {
        $this->itemsData();
        return view('livewire.cart-table',[
            "items" => $this->items
        ]);
    }
}
