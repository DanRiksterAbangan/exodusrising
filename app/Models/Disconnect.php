<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disconnect extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv_user';
    public $timestamps = false;
    protected $table = "dbo.tdisconnect";
    protected $primaryKey = 'user_id';

    protected $guarded = [];
}
