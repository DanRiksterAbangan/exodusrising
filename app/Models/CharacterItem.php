<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *@mixin \Eloquent
 */
class CharacterItem extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv_game';
    public $timestamps = false;
    protected $table = "dbo.titem";
    protected $primaryKey = "id";

    public function character(){
        return $this->belongsTo(Character::class,"char_id","id");
    }

    public function user(){
        return $this->belongsTo(User::class,"user_id","user_id");
    }
}
