<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(){

        $user = auth()->user();
        $characters = Cache::remember("characters_".$user->user_id,120,function()use($user){
            $characters = $user->characters;
            $characters->load(["conqueror","characterAbility"]);
            return $characters;
        });

        return view("pages.account.index",compact('characters'));
    }
}
