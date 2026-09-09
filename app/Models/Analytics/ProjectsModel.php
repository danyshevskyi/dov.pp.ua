<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProjectsModel extends Model
{
    public function getProject($project) {
        if($project == 'all')
        {
            return DB::table('analytics_projects')->get();
        }
        else
        {
            return DB::table('analytics_projects')->where('key_name', $project)->first();
        }
        
    } 
}
