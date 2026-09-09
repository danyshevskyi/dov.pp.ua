<?php

// analytics_scode_visits

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VisitsModel extends Model
{

public $table;

public function __construct($table) {
    $this->table = $table;
}

public function saveVisit($visit_data) {
    $id_visit = DB::table($this->table)->insertGetId($visit_data);
        // Rewriting $this->activity_data['id_visit']
        // $this->activity_data['id_visit'] = $id_visit;

        return $id_visit;
}

public function updateVisit($visit_in, $visit_data) {
    // $visit_data['score'] = $this->getScore($visit_data) + 1;
    
    $visit_data['score'] = $visit_in->score + 1;
    DB::table($this->table)
            ->where('id_visit', $visit_in->id_visit)
            ->update($visit_data);

            // var_dump($visit_in);
}

/** @return int user score */
public function getScore($id_visit) {
        return DB::table($this->table)
                    ->where('id_visit', $id_visit)
                    ->value('score');
}

/** @return array visit in */
public function isIpExistToday($ip) {
    $visit_in = DB::table($this->table)
             ->whereDate('date_visit', now())
             ->where('ip', $ip)
             ->first();
    // Rewriting $this->action_data['id_visit']
    // $this->activity_data['id_visit'] = $id_visit;
    return $visit_in;
}

public function getVisits($period) {
    if($period == 'today')
    {
        return DB::table($this->table)
            ->selectRaw("
            id_visit,
            ip,
            email,
            device,
            os,
            browser,
            country,
            region,
            city,
            lang,
            latitude,
            longitude,
            isp,
            referer,
            score,
            TIME_FORMAT(date_visit, '%H:%i') as date_visit
            ")
            ->whereDate('date_visit', now())
            ->orderByDesc('date_visit')
            ->get();
    }
    elseif($period == 'yesterday')
    {
        return DB::table($this->table)
        ->selectRaw("
        id_visit,
        ip,
        email,
        device,
        os,
        browser,
        country,
        region,
        city,
        lang,
        latitude,
        longitude,
        isp,
        referer,
        score,
        TIME_FORMAT(date_visit, '%H:%i') as date_visit
        ")
        ->whereDate('date_visit', now()->subDay())
        ->orderByDesc('date_visit')
        ->get();
    } elseif ($period == 'current_month')
    {
        return DB::table($this->table)
        ->whereMonth('date_visit', now()->month)
        ->whereYear('date_visit', now()->year)
        ->orderByDesc('date_visit')
        ->get();
    } elseif ($period == 'last_month')
    {
        return DB::table($this->table)
        ->whereMonth('date_visit', now()->subMonth()->month)
        ->whereYear('date_visit', now()->subMonth()->year)
        ->orderByDesc('date_visit')
        ->get();
    }
}

// public function getVisitsTotal($period) { // $period = 'today'
//     $response = [];

//     $today_visit = $this->getVisits($period);

//     return $today_visit;
// }

}