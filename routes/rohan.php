<?php
use App\Http\Controllers\RohanAuthController;

Route::post("/RohanAuth/sendcode3.{type}", [RohanAuthController::class, "sendcode"]);
Route::post("/RohanAuth/Login5.{type}", [RohanAuthController::class, "login5"]);
Route::post("/RohanAuth/ServerList5.{type}", [RohanAuthController::class, "serverlist"]);

