<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *@mixin \Eloquent
 */
class TradeItem extends Model
{
    use HasFactory;


    protected $connection = 'sqlsrv_stat';
    public $timestamps = false;
    protected $table = "ttradeitem";
    protected $primaryKey = null;

    protected $guarded = [];
}
