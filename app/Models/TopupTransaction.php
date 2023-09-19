<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopupTransaction extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $connection = 'sqlsrv';
    protected $table = "dbo.topup_transactions";

    public function user(){
        return $this->belongsTo(User::class,"user_id","user_id");
    }

    public function processedBy(){
        return $this->belongsTo(User::class,"processed_by","user_id");
    }
}
