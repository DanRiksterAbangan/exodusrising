<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemmallController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(["middleware"=>"auth"],function(){
    Route::get("/",[HomeController::class,"index"])->name("home");
    Route::get("/itemmall",[ItemmallController::class,"index"])->name("itemmall");

    Route::group(["prefix"=>"admin","middleware"=>"admin"],function(){
        Route::get("/users",[UserController::class,"users"])->name("users");
        Route::get("/itemmall/additem",[ItemmallController::class,"addItemView"])->name("itemmall.additem");
    });

});

Route::post('/logout', [LoginController::class,"logout"])->name("logout");

Route::group(['middleware'=>'guest'],function(){
     Route::get('/login', [LoginController::class,"index"])->name("login");
     Route::get('/register', [RegisterController::class,"index"])->name("register");
});
