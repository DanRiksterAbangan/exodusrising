<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GiftCodeController extends Controller
{
    public function giftcodes(){
        return view("pages.admin.giftcodes");
    }
}
