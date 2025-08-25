<?php

use App\Http\Controllers\ScodeController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Analytics\App\Models\Count;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/feedback', [FeedbackController::class, 'create_feedback']);

// *** Scode project ***
Route::post('/scode', function(Request $request) { 
    // DOV Analytics
    $count = new Count('scode', 'all');
        $count->count();

    $ScodeController = new ScodeController();
        return $ScodeController->search($request);
});

Route::post('/scode/all', function() {
    // DOV Analytics
    $count = new Count('scode', 'all');
        $count->count();

    $ScodeController = new ScodeController();
        return $ScodeController->getAllScodes();
});

Route::post('/scode/stacker/components', function() {
    // DOV Analytics
    // $count = new Count('scode', 'all');
    //     $count->count();

    $ScodeController = new ScodeController();
        return $ScodeController->getStackerComponents();
});
// /*** Scode project ***