<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GatewayController extends Controller
{
    public function gateways(){
        return view("pages.admin.gateways");
    }
}
