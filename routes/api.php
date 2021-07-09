<?php

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register',[RegisteredUserController::class,'store']);
Route::post('login',[UserController::class,'login']);

Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get('profile',[UserController::class,'profile']);
    Route::get('logout',[UserController::class,'logout']);

    Route::post('create-project',[ProjectController::class,'createProject']);
    Route::get('list-project',[ProjectController::class,'listProject']);

    Route::get('single-project/{id}',[ProjectController::class,'singleProject']);
    Route::delete('delete-project/{id}',[ProjectController::class,'deleteProject']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
