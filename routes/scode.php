<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Analytics\App\Models\Count;
use App\Http\Controllers\ScodeController;

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
    $ScodeController = new ScodeController();
        return $ScodeController->getStackerComponents();
});
