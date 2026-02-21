<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;

class AnalyticsModel extends Model
{
    protected $table = 'analytics_requests_scodes';

    public $timestamps = false;

    protected $fillable = [
        'ip',
        'url',
        'body',
    ];
}
