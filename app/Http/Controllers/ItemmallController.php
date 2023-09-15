<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class ItemmallController extends Controller
{
    public function index(){
        return view("pages.itemmall.index");
    }

    public function addItemView(){
        return view("pages.itemmall.additem");
    }

}
