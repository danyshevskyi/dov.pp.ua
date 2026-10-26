<?php 

namespace App\Models\Analytics\Traits;

use Illuminate\Support\Facades\DB;

trait VisitTrait {

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
    
    /** @return array visit_in */
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