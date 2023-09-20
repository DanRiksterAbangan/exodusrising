<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
/**
 *@mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $connection = 'sqlsrv_user';
    public $timestamps = false;
    protected $table = "dbo.tuser";
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'login_id',
        'login_pw',
        'login_pw2',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function mallItems(){
        return $this->hasMany(MallTItem::class,"user_id","user_id");
    }

    public function characters(){
        return $this->hasMany(Character::class,"user_id","user_id");
    }

    public function kills(){
        return $this->hasManyThrough(Kill::class,Character::class,"user_id","char_id","user_id","id");
    }

    public function killedBy(){
        return $this->hasManyThrough(Kill::class,Character::class,"user_id","pk_char_id","user_id","id");
    }

    public function isAdmin(){
        return $this->grade == 250;
    }
    public function carts(){
        return $this->hasMany(Cart::class,"user_id","user_id");
    }

    public function transactions(){
        return $this->hasMany(Transaction::class,"user_id","user_id");
    }

    public function disconnect(){
        return $this->hasOne(Disconnect::class,"user_id","user_id");
    }

    public function topupTransactions(){
        return $this->hasMany(TopupTransaction::class,"user_id","user_id");
    }

    public function pendingTopupTransactions(){
        return $this->topupTransactions()->where("status","pending");
    }

    public function topupTransactionsProcessed(){
        return $this->hasMany(TopupTransaction::class,"processed_by","user_id");
    }

    public function banned(){
        return $this->hasOne(BanUser::class,"user_id","user_id");
    }

    public function isBanned(){
        return $this->banned()->where("until_date",">",now())->first();
    }

    public function bannedBy(){
        return $this->hasOne(BanUser::class,"banned_by","user_id");
    }

    public function claimedGiftCodes(){
        return $this->hasMany(GiftCode::class,"claimed_by","user_id");
    }

    public function createdGiftCodes(){
        return $this->hasMany(GiftCode::class,"created_by","user_id");
    }



}
