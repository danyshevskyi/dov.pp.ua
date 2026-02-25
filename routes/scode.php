<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScodeController;

Route::post('/scode/open_app', [ScodeController::class, 'analytics']);
Route::post('/scode/add_desktop', [ScodeController::class, 'analytics']);
Route::post('/scode/about', [ScodeController::class, 'analytics']);
Route::post('/scode/donats', [ScodeController::class, 'analytics']);
Route::post('/scode/dan', [ScodeController::class, 'analytics']);
Route::post('/scode/search', [ScodeController::class, 'search']);
Route::post('/scode/scodes_all', [ScodeController::class, 'getAllScodes']);
Route::post('/scode/stacker', [ScodeController::class, 'getStackerComponents']);
Route::post('/scode/controller', [ScodeController::class, 'getControllerComponents']);
Route::post('/scode/controller_functions', [ScodeController::class, 'getControllerFunctions']);
