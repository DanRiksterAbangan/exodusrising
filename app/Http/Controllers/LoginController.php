<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{


    public function index(){
        return view("pages.auth.login");
    }

    public function logout(){
        auth()->logout();
        return redirect()->route("login");
    }

    public function passwordRequest(){
        return view("pages.auth.password-request");
    }

    public function passwordReset(string $token){
        return view("pages.auth.password-reset",compact("token"));
    }

}
