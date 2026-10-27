<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;
use App\Models\Analytics\Traits\ActionTrait;

class AnalyticsAnalyticsActions extends Model
{
    use ActionTrait;
    protected $table = 'analytics_analytics_actions';
}
