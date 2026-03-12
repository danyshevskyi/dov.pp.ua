<?php

use App\Http\Controllers\Feedback\FeedbackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/feedback', [FeedbackController::class, 'create']);

require_once 'scode.php';
require_once 'analytics.php';
