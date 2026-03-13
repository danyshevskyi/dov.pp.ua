<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalyticsController;

// http://localhost:8000/api - backend for all project
// http://localhost:8000/api/{project} - backand for project
// http://localhost:8000/api/analytics/{project}/{activity} - api for get analytics

Route::prefix('analytics/{project}')->group(function () {
    Route::post('{action}', [AnalyticsController::class, 'save_analytics'])
        ->whereIn('action', [
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
