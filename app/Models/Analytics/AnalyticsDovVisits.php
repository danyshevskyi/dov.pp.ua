<?php

// php artisan make:model /Analytics/NameClass

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;
use App\Models\Analytics\Traits\VisitTrait;

class AnalyticsDovVisits extends Model
{
    use VisitTrait;

    protected $primaryKey = 'id_visit';
    protected $table = 'analytics_dov_visits';

    public function actions() {
        return $this->hasMany(AnalyticsDovActions::class, 'id_visit', 'id_visit')
        ->select('id_visit', 'action_name', 'action_data');
    }

}
