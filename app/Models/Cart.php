<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';
    protected $guarded=[];

    public function item(){
        return $this->belongsTo(Item::class,"item_id");
    }

    public function user(){
        return $this->belongsTo(User::class,"user_id","user_id");
    }

    public function getDiscountedPriceAttribute(){
        return ($this->item->amount - ($this->item->amount * ($this->item->discount / 100))) * $this->stack ;
    }
}
