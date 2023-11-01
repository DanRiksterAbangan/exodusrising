<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopupController extends Controller
{
    public function topupList(){
        return view("pages.admin.topup-list");
    }

    public function topup(){
        return view("pages.account.topup");
    }

    public function topupImage($image){
        $user  = auth()->user();
        if($user->isBanned()){
            return abort(404);
        }
        if($user->isAdmin() || $user->isSuperAdmin()){
            return response()->file(storage_path("app/upload/topups/".$image));
        }
        $image = $user->topupTransactions()->where("image",$image)->firstOrFail()->image;
        return response()->file(storage_path("app/upload/topups/".$image));
    }
}
