<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ScodeActivitiesModel extends Model
{
    public function saveActivity($activity_data): void {
        DB::table('analytics_scode_activities')->insert($activity_data);
    }
}
