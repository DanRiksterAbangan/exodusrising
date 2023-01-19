<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Item extends Model
{
    use HasFactory,Searchable;
    protected $appends = ['discounted_price'];

    protected $guarded = [];

    public function getDiscountedPriceAttribute(){
        return $this->amount - ($this->amount * ($this->discount / 100));
    }
}
