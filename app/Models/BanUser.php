<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BanUser extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class,"user_id","user_id");
    }

    public function bannedBy(){
        return $this->belongsTo(User::class,"banned_by","user_id");
    }
}
