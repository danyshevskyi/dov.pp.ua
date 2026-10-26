<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\DB;
use App\Models\Analytics\Traits\ActionTrait;

class AnalyticsScodeActions extends Model
{
    use ActionTrait;

    protected $table = 'analytics_scode_actions';

    // public function saveAction($action_data): void {
    //     DB::table($this->table)->insert($action_data);
    // }
    
    // public function getAction($id_visit) {
    //     return DB::table($this->table)->where('id_visit', $id_visit)->get();
    // }
}
