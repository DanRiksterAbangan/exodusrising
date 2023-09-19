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
}
