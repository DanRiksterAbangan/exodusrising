<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\GiftCodeController;
use App\Http\Controllers\ItemmallController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TopupController;
use App\Http\Controllers\TracerController;
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
Route::group(["middleware" => "auth"], function () {
    Route::get("/", [AccountController::class, "redirect"])->name("redirect");
    Route::get("/myaccount",[AccountController::class,"index"])->name("account");
    Route::get("/transations",[AccountController::class,"transactions"])->name("account.transactions");
    Route::get("/giftcodes",[AccountController::class,"giftcodes"])->name("account.giftcodes");
    Route::get("/topup/transctions",[AccountController::class,"topupTransactions"])->name("account.topup.transactions");
    Route::get("/itemmall",[ItemmallController::class,"index"])->name("itemmall");
    Route::get("/itemmall/cart",[ItemmallController::class,"cart"])->name("itemmall.cart");

    Route::get("/topup",[TopupController::class,"topup"])->name("topup");

    Route::group(["prefix"=>"admin","middleware"=>"admin"],function(){
        Route::get("/users",[UserController::class,"users"])->name("admin.users");
        Route::get("/users/{user}",[UserController::class,"user"])->name("admin.user");
        Route::get("/itemmall/additem",[ItemmallController::class,"addItemView"])->name("itemmall.additem");
        Route::get("/tracer",[TracerController::class,"tracer"])->name("admin.tracer");
        Route::get("/topups",[TopupController::class,"topupList"])->name("admin.topups");
        Route::get("/giftcodes",[GiftCodeController::class,"giftcodes"])->name("admin.giftcodes");
    });


});

Route::post('/logout', [LoginController::class,"logout"])->name("logout");


Route::group(['middleware'=>'guest'],function(){
     Route::get('/login', [LoginController::class,"index"])->name("login");
     Route::get('/register', [RegisterController::class,"index"])->name("register");
     Route::get('/forgot-password',[LoginController::class,"passwordRequest"])->name('password.request');
     Route::get('/reset-password/{token}', [LoginController::class,"passwordReset"])->name('password.reset');
});
