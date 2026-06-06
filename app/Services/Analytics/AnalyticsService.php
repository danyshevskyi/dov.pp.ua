<?php

namespace App\Services\Analytics;

use App\Services\Analytics\IpInfo;
use App\Services\Analytics\UserAgentParser;
use \Kudashevs\AcceptLanguage\AcceptLanguage;
use Illuminate\Support\Facades\DB;

class AnalyticsService {

/** @var array  
 * ip
 * referer
 * score
 * date_activity
 * device
 * os
 * browser
 * country
 * region
 * city
 * isp
 * latitude
 * longitude
 * lang
*/
public $analytics_data = [];

public function __construct($request_data) {
    
    // writing ip, referer, score, data_activity
    $this->analytics_data = array_merge($this->analytics_data,
    [
        'ip' => $request_data['ip'],
        'referer' => $request_data['referer'],
        'score' => 1, // default value
        'date_activity' => now()
    ]);

    // writing device, os, browser
    $UserAgentParser = new UserAgentParser($request_data['user_agent']);
    $this->analytics_data = array_merge($this->analytics_data,
    [
        'device' => $UserAgentParser->device,
        'os' => $UserAgentParser->os,
        'browser' => $UserAgentParser->browser
    ]);

    // writing country, region, city, isp, latitude, longitude
    $IpInfo = new IpInfo($request_data['ip']);
    $this->analytics_data = array_merge($this->analytics_data,
    [
        'country' => $IpInfo->country,
        'region' => $IpInfo->region,
        'city' => $IpInfo->city,
        'isp' => $IpInfo->isp,
        'latitude' => $IpInfo->latitude,
        'longitude' => $IpInfo->longitude
    ]);

    // writing lang
    $AcceptLanguage = new AcceptLanguage();
    $AcceptLanguage->process();
    $this->analytics_data['lang'] = $AcceptLanguage->getLanguage();
}

public function startServices($request) {

    $id_visits = $this->isIpExistToday($request->ip());
    
    if(filled($id_visits))

    {
        // $this->createEvent($this->updateVisit($id_visits));

        $this->updateVisit($id_visits);
    }
    else
    {
        // $this->createEvent($this->createVisit());
        $this->createVisit();
    }
}

public function createVisit(): void {
    DB::table('analytics_scode_visits')->insert($this->analytics_data);
}

/** @param int id visits */
public function updateVisit($id_visit) {
    $this->analytics_data['score'] = $this->getScore($id_visit) + 1;
    DB::table('analytics_scode_visits')
            ->where('id', $id_visit)
            ->update($this->analytics_data);
}

/** @param int id visit */
public function createEvent() : void {
}

/** @return int id visits */
public function getScore($id_visit) {
    return DB::table('analytics_scode_visits')
                ->where('id', $id_visit)
                ->value('score');

}

/** @return int id visits */
public function isIpExistToday($ip) {
    return DB::table('analytics_scode_visits')
             ->whereDate('date_activity', now()->format('Y-m-d'))
             ->where('ip', $ip)
             ->value('id');
 }

}
