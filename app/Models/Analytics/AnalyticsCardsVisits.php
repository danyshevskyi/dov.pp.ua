<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;
use App\Models\Analytics\Traits\VisitTrait;

class AnalyticsCardsVisits extends Model
{   
    use VisitTrait;

    protected $primaryKey = 'id_visit';
    protected $table = 'analytics_cards_visits';

    public function actions() {
        return $this->hasMany(AnalyticsCardsActions::class, 'id_visit', 'id_visit')
        ->select('id_visit', 'action_name', 'action_data');
    }
}
