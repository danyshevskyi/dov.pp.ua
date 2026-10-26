<?php

// php artisan make:model /Analytics/NameClass

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;

use App\Models\Analytics\Traits\VisitTrait;

class AnalyticsMilesVisits extends Model
{
    use VisitTrait;
 
    protected $primaryKey = 'id_visit';
    protected $table = 'analytics_miles_visits';

    public function actions() {
        return $this->hasMany(AnalyticsMilesActions::class, 'id_visit', 'id_visit')
        ->select('id_visit', 'action_name', 'action_data');
    }

}
