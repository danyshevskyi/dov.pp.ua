<?php

namespace App\Models\Analytics;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AnalyticsModel extends Model
{
    public function create(Request $request) {
        return DB::table('analytics_requests_scodes')->insert([
            'ip'   => $request->ip(),
            'url'  => $request->segment(4),
            'body' => json_encode($request->all(), JSON_UNESCAPED_UNICODE)
        ]);
    }


public function ipExistToday($ip): bool {
    return true;
}

public function isAuth() { // return email or null
    return true;
}
 
 public function createVisit() {
 
 }
 
 public function updateVisit() {
 
 }
 
 public function createEvent() {
 
}

}