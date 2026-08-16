<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalyticsController;

// http://localhost:8000/api - backend for all project
// http://localhost:8000/api/{project} - backand for project
// http://localhost:8000/api/analytics/{project}/{action} - api for get analytics

// https://dov.pp.ua/api/analytics/{project}/{action}/{activity} - save analytics (visits and activity)
// https://dov.pp.ua/api/analytics/miles/save/open_app

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
Route::post('analytics/get', [AnalyticsController::class, 'getServices']);


// save analytics
Route::prefix('analytics/{project}/save')->group(function () {
    Route::post('{activity}', [AnalyticsController::class, 'saveServices'])
        ->whereIn('activity', [
            'open_app',
            'menu',
            'add_desktop',
            'about',
            'donats',
            'footer',
            'feedback',
            'scode_all',
            'scode_search',
            'stacker_scheme',
            'stacker_functions',
            'controller_scheme',
            'controller_functions'
        ]);
});
