<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('user/index',[UserController::class,'index'] );
Route::post('/user/store',[UserController::class,'Store'] );
Route::post('/user/login',[UserController::class,'login'] );

Route::middleware('auth:api')->group(function(){
    Route::get('/user/info',[UserController::class,'user'] );
    Route::post('/user/logout',[UserController::class,'logout'] );
});
