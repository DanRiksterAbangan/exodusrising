<?php

namespace App\Http\Controllers;

class UserLoginController extends Controller
{
    public function manager(){


        return view("pages.admin.user-login-manager");
    }
}
