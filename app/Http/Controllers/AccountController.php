<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AccountController extends Controller
{
    public function index(){
        $user = auth()->user();
        $characters = Cache::remember("characters_".$user->user_id,60,function()use($user){
            $characters = $user->characters()->with("conqueror","characterAbility","tradeItem","killed")->get();
            return $characters;
        });
        $kills = Cache::remember("kills_".$user->user_id,60,function()use($user){
            return collect($user->kills)->merge($user->killedBy)->sortByDesc("date");;
        });
        return view("pages.account.myaccount",compact('user','characters','kills'));
    }

    public function transactions(){
        return view("pages.account.transactions");
    }

    public function topupTransactions(){
        return view("pages.account.topuptransactions");
    }

    public function giftcodes(){
        return view("pages.account.giftcodes");
    }

    public function redirect(){
        return redirect()->route("account");
    }



}
