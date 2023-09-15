<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *@mixin \Eloquent
 */
class Character extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv_game';
    public $timestamps = false;
    protected $table = "tcharacter";
    protected $primaryKey = 'id';

    public function user(){
        return $this->belongsTo(User::class,"user_id","user_id");
    }

    public function characterAbility(){
        return $this->hasOne(CharacterAbility::class,"char_id","id");
    }

    public function conqueror(){
        return $this->hasOne(Conqueror::class,"char_id","id");
    }

    public function tradeItem(){
        return $this->hasMany(TradeItem::class,"seller_name","name");
    }

    public function killed(){
        return $this->hasMany(Kill::class,"char_id","id");
    }

    public function killedBy(){
        return $this->hasMany(Kill::class,"char_id","id");
    }
}
