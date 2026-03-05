<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScodeController;

Route::post('/scode/scode_search', [ScodeController::class, 'search']);
Route::post('/scode/scode_all', [ScodeController::class, 'getAllScodes']);
Route::post('/scode/stacker', [ScodeController::class, 'getStackerComponents']);
Route::post('/scode/controller', [ScodeController::class, 'getControllerComponents']);
Route::post('/scode/controller_functions', [ScodeController::class, 'getControllerFunctions']);
