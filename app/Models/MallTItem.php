<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 *@mixin \Eloquent
 */
class MallTItem extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv_mall';
    public $timestamps = false;
    protected $table = "titem";
    protected $primaryKey = 'id';

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,"user_id","user_id");
    }

}
