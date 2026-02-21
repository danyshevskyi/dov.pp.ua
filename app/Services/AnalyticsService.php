<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Analytics\AnalyticsModel;

class AnalyticsService
{
    public function create(Request $request): void
    {
        AnalyticsModel::create([
           'ip'   => $request->ip(),
            'url'  => $request->segment(3),
            'body' => json_encode($request->all(), JSON_UNESCAPED_UNICODE)
        ]);
    }
}