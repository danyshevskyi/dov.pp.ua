<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['middleware' => 'auth:sanctum'], function () {
    // Route::get('/user', function (Request $request) {
    //     return $request->user();
    // });
    
    // Route::post('/logout', 'AuthController@logout');

    Route::get('/userprofile', [AuthController::class, 'userprofile']);
    
    Route::get('/logout', [AuthController::class, 'logout']);

});