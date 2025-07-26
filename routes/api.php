<?php

use App\Http\Controllers\ScodeController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/scode', [ScodeController::class, 'search']);

Route::post('/scode/all', [ScodeController::class, 'getAllScodes']);

Route::post('/feedback', [FeedbackController::class, 'create_feedback']);
