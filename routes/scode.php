<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Analytics\App\Models\Count;
use App\Http\Controllers\ScodeController;

Route::post('/scode/open_app', function() {
    // DOV Analytics
    $count = new Count('scode', 'all');
        $count->count();
});

Route::post('/scode/search', function(Request $request) { 
    // DOV Analytics
    $count = new Count('scode', 'all');
        $count->count();

    $ScodeController = new ScodeController();
        return $ScodeController->search($request);
});

Route::post('/scode/scodes_all', function() {
    // DOV Analytics
    $count = new Count('scode', 'all');
        $count->count();

    $ScodeController = new ScodeController();
        return $ScodeController->getAllScodes();
});

Route::post('/scode/stacker', function() {
    $ScodeController = new ScodeController();
        return $ScodeController->getStackerComponents();
});

Route::post('/scode/controller', function() {
    $ScodeController = new ScodeController();
        return $ScodeController->getControllerComponents();
});
