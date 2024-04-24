<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post("create/account",[AccountController::class,'create']);
Route::post("create/user",[UserController::class,'create']);
Route::get("list/account",[AccountController::class,'list']);
