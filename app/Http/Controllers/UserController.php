<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function users(){
        return view("pages.admin.users");
    }


    public function user(User $user){
        $userData  = $user->load("mallItems","characters.conqueror","characters.characterAbility","kills.killer","kills.killed","killedBy.killer","killedBy.killed");
        $characters = $userData->characters;
        $kills = collect($userData->kills)->merge($userData->killedBy)->sortByDesc("date");
        $mallItems = $userData->mallItems;
        return view("pages.admin.users.user",compact('characters','kills','mallItems','userData'));
    }
}
