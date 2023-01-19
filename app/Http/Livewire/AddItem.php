<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddItem extends Component
{
    use WithFileUploads;
    public $categories = [
        "ETC",
        "Option Stone",
        "Forging Stone",
        "Costume",
        "Talisman",
        "Scroll",
        "Exp Scroll",
        "Pet",
        "VIP"
    ];

    public $type;
    public $image;
    public $name;
    public $description;
    public $stack;
    public $category;
    public $amount;
    public $discount;
    public $show = true;

    public function addItem(){
       $validation = $this->validate([
            "type"=>"required|numeric",
            "image"=>"required|image",
            "name"=>"required",
            "description"=>"required",
            "stack"=>"required|numeric",
            "category"=>"required",
            "amount"=>"required|numeric",
            "discount"=>"required|numeric",
            "show"=>"required|boolean"
        ]);

        $itemImage = $this->image->storePublicly('/public/items_images');
        $item = Item::create([
            "type"=> $this->type,
            "image"=> $itemImage,
            "name"=> $this->name,
            "description"=> $this->description,
            "stack"=> $this->stack,
            "category"=> $this->category,
            "amount"=> $this->amount,
            "discount"=> $this->discount,
            "show" => $this->show,
            "added_by" => auth()->user()->user_id
        ]);
        $this->clearFields();
         session()->flash("message","Item added successfully");
    }

    private function clearFields(){
        $this->type  = null;
        $this->image = null;
        $this->name= null;
        $this->description= null;
        $this->stack= null;
        $this->category= null;
        $this->amount= null;
        $this->discount= null;
        $this->show= null;
    }

    public function render()
    {
        return view('livewire.add-item');
    }
}
