<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftCode extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';
    protected $guarded=[];

    public function claimedBy(){
        return $this->belongsTo(User::class,"claimed_by","user_id");
    }

    public function createdBy(){
        return $this->belongsTo(User::class,"created_by","user_id");
    }


}
