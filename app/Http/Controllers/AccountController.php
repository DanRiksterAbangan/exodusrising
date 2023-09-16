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

        return view("pages.account.myaccount",compact('characters','kills'));
    }

    public function redirect(){
        return redirect()->route("account");
    }
}
