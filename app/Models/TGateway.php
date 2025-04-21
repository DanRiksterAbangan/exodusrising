<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TGateway extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $connection = 'sqlsrv_user';
    public $timestamps = false;
    protected $table = "dbo.tgateways";
    protected $primaryKey = null;
    public $incrementing = false;
}
