<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TracerController extends Controller
{
    public function tracer(){
        return view("pages.admin.tracer");
    }
}
