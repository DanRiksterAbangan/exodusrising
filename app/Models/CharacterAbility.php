<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterAbility extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv_game';
    public $timestamps = false;
    protected $table = "tcharacterability";
    protected $primaryKey = false;

    public function character(){
        return $this->belongsTo(User::class,"char_id","id");
    }
}
