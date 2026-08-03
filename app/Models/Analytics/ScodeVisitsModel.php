<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ScodeVisitsModel extends Model
{
    public function saveVisit($visit_data): void {
        $id_visit = DB::table('analytics_scode_visits')->insertGetId($visit_data);
            // Rewriting $this->activity_data['id_visit']
            // $this->activity_data['id_visit'] = $id_visit;
    }
    
    public function updateVisit($visit_in, $visit_data) {
        // $visit_data['score'] = $this->getScore($visit_data) + 1;
        
        $visit_data['score'] = $visit_in->score + 1;
        DB::table('analytics_scode_visits')
                ->where('id_visit', $visit_in->id_visit)
                ->update($visit_data);

                // var_dump($visit_in);
    }

    /** @return int user score */
    public function getScore($id_visit) {
        return DB::table('analytics_scode_visits')
                    ->where('id_visit', $id_visit)
                    ->value('score');
}

/** @return array visit in */
public function isIpExistToday($ip) {
    $visit_in = DB::table('analytics_scode_visits')
             ->whereDate('date_visit', now())
             ->where('ip', $ip)
             ->first();
    // Rewriting $this->action_data['id_visit']
    // $this->activity_data['id_visit'] = $id_visit;
    return $visit_in;
}

}
