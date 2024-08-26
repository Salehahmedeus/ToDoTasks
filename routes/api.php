<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('user/index',[UserController::class,'index'] );
Route::post('/user/store',[UserController::class,'Store'] );
Route::post('/user/login',[UserController::class,'login'] );
