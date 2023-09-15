<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class HomeController extends Controller
{
    public function index(){

        $user = auth()->user();
        $characters = Cache::remember("characters_".$user->user_id,60,function()use($user){
            $characters = $user->characters()->with("conqueror","characterAbility","tradeItem","killed")->get();
            return $characters;
        });
        $kills = Cache::remember("kills_".$user->user_id,60,function()use($user){
            return $user->kills;
        });

        return view("pages.account.index",compact('characters','kills'));
    }
}
