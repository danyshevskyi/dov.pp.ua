<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\Analytics\GetController;
use App\Http\Controllers\Analytics\SaveController;

// http://localhost:8000/api - backend for all project
// http://localhost:8000/api/{project} - backand for project
// http://localhost:8000/api/analytics/{project}/{action} - api for get analytics



// https://dov.pp.ua/api/analytics/{project}/{action}/{activity} - save analytics (visits and activity)
// https://dov.pp.ua/api/analytics/miles/save/open_app





// new
// https://dov.pp.ua/api/analytics/get
// https://dov.pp.ua/api/analytics/save




// https://dov.pp.ua/api/analytics/scode/open_app


// https://dov.pp.ua/api/analytics/{project}/{action}/{date} - get analytics
// https://dov.pp.ua/api/analytics/miles/get/now

// https://dov.pp.ua/api/analytics/total/get/now



// Route::prefix('analytics/{project}')->group(function () {
//     Route::post('now', [AnalyticsController::class, 'analyticsServices']);
// });

// get analytics
// Route::prefix('analytics/{project}/get')->group(function () {
//     Route::post('{date}', [AnalyticsController::class, 'getServices'])
//         ->whereIn('date', [
//             'now',
//             'yesterday',
//             'current_month',
//             'last_month'   
//         ]);
// });


// get analytics
Route::post('analytics/get', [GetController::class, 'getServices']);

Route::post('analytics/save', [SaveController::class, 'saveServices']);

// save analytics
// Route::prefix('analytics/{project}/save')->group(function () {
//     Route::post('{activity}', [AnalyticsController::class, 'saveServices'])
//         ->whereIn('activity', [
//             'open_app',
//             'menu',
//             'add_desktop',
//             'about',
//             'donats',
//             'footer',
//             'feedback',
//             'scode_all',
//             'scode_search',
//             'stacker_scheme',
//             'stacker_functions',
//             'controller_scheme',
//             'controller_functions'
//         ]);
// });

