<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 *@mixin \Eloquent
 */
class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $connection = 'sqlsrv';
    protected $table = "dbo.transactions";

    public function item(){
        return $this->belongsTo(Item::class,"item_id","id");
    }

    public function user(){
        return $this->belongsTo(User::class,"user_id","user_id");
    }
}
