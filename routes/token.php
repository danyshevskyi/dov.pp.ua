<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenAuthController;

// /api/...

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/check_token', function (Request $request) {
    return response()->json([
        'status' => true,
        'user' => $request->user()
    ]);
});

Route::post('register', [TokenAuthController::class, 'register']);
Route::post('/login', [TokenAuthController::class, 'login']);
Route::post('/logout', [TokenAuthController::class, 'logout']);