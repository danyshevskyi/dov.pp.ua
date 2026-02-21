<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScodeController;

Route::post('/scode/open_app', [ScodeController::class, 'analytics']);
Route::post('/scode/search', [ScodeController::class, 'search']);
Route::post('/scode/scodes_all', [ScodeController::class, 'getAllScodes']);
Route::post('/scode/stacker', [ScodeController::class, 'getStackerComponents']);
Route::post('/scode/controller', [ScodeController::class, 'getControllerComponents']);
