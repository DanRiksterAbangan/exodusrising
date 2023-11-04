<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *@mixin \Eloquent
 */
class Streamer extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';

    protected $guarded = [];

    protected $table = "streamers";
    public function user(){
        return $this->belongsTo(User::class,"user_id","user_id");
    }

    public function topups(){
        return $this->hasMany(TopupTransaction::class, "streamer_code", "code");
    }


}
