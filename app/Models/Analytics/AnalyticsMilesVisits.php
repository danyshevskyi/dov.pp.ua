<?php

// php artisan make:model /Analytics/NameClass

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AnalyticsMilesVisits extends Model
{

protected $primaryKey = 'id_visit';
protected $table = 'analytics_miles_visits';

public function actions() {
    return $this->hasMany(AnalyticsMilesActions::class, 'id_visit', 'id_visit')
    ->select('id_visit', 'action_name', 'action_data');
}

public function getVisits($period) {
    if($period == 'today')
    {
        return self::query()
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
        ->with('actions')
        ->orderByDesc('date_visit')
        ->get();
    }
    elseif($period == 'yesterday')
    {
        return self::query()
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
        ->with('actions')
        ->orderByDesc('date_visit')
        ->get();
    }
    elseif ($period == 'current_month')
    {
        return self::query()
        ->whereMonth('date_visit', now()->month)
        ->whereYear('date_visit', now()->year)
        ->with('actions')
        ->orderByDesc('date_visit')
        ->get();
    } elseif ($period == 'last_month')
    {
        return self::query()
        ->whereMonth('date_visit', now()->subMonth()->month)
        ->whereYear('date_visit', now()->subMonth()->year)
        ->with('actions')
        ->orderByDesc('date_visit')
        ->get();
    }
}

/** @return array visit in */
public function isIpExistToday($ip) {
    $visit_in = DB::table($this->table)
            ->whereDate('date_visit', now())
            ->where('ip', $ip)
            ->first();
    return $visit_in;
}

public function updateVisit($visit_in, $visit_data) {  
    $visit_data['score'] = $visit_in->score + 1;
    DB::table($this->table)
            ->where('id_visit', $visit_in->id_visit)
            ->update($visit_data);
}

public function saveVisit($visit_data) {
    $id_visit = DB::table($this->table)->insertGetId($visit_data);
        return $id_visit;
}

}
