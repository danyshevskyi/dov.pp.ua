<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProjectsModel extends Model
{
    public function getProjects() {
        return DB::table('analytics_projects')->get();
    } 
}
