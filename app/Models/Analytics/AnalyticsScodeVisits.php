<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;

class AnalyticsScodeVisits extends Model
{
    protected $primaryKey = 'id_visit';

    public function activities() {
        return $this->hasMany(AnalyticsScodeActions::class, 'id_visit', 'id_visit')
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
            ->with('activities')
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
            ->with('activities')
            ->orderByDesc('date_visit')
            ->get();
        }
        elseif ($period == 'current_month')
        {
            return self::query()
            ->whereMonth('date_visit', now()->month)
            ->whereYear('date_visit', now()->year)
            ->with('activities')
            ->orderByDesc('date_visit')
            ->get();
        } elseif ($period == 'last_month')
        {
            return self::query()
            ->whereMonth('date_visit', now()->subMonth()->month)
            ->whereYear('date_visit', now()->subMonth()->year)
            ->with('activities')
            ->orderByDesc('date_visit')
            ->get();
        }
    }
}
