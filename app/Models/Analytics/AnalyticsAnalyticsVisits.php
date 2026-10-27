<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;
use App\Models\Analytics\Traits\VisitTrait;

class AnalyticsAnalyticsVisits extends Model
{   
    use VisitTrait;

    protected $primaryKey = 'id_visit';
    protected $table = 'analytics_analytics_visits';

    public function actions() {
        return $this->hasMany(AnalyticsAnalyticsActions::class, 'id_visit', 'id_visit')
        ->select('id_visit', 'action_name', 'action_data');
    }
}
