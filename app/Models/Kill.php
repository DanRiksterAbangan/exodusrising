<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *@mixin \Eloquent
 */
class Kill extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv_game';
    public $timestamps = false;
    protected $table = "tkill";
    protected $primaryKey = null;

    protected $guarded = [];

    public function killed(){
        return $this->belongsTo(Character::class,"pk_char_id","id")->where("name","not like","!%");
    }

    public function killer(){
        return $this->belongsTo(Character::class,"char_id","id")->where("name","not like","!%");
    }

}
