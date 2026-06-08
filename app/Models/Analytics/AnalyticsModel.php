<?php

namespace App\Models\Analytics;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use \Kudashevs\AcceptLanguage\AcceptLanguage;
use App\Services\Analytics\IpInfo;
use App\Services\Analytics\UserAgentParser;

class AnalyticsModel extends Model {

/** @var array  
 * ip
 * referer
 * score
 * date_visit
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
public $visit_data = [];

/** @var array
 * id_visit
 * action
 * body
 * date_action
 */
public $action_data = [];

public function __construct($request_data) {
    
    // writing ip, referer, score, data_activity
    $this->visit_data = array_merge($this->visit_data,
    [
        'ip' => $request_data['ip'],
        'referer' => $request_data['referer'],
        'score' => 1, // default value
        'date_visit' => now()
    ]);

    // writing device, os, browser
    $UserAgentParser = new UserAgentParser($request_data['user_agent']);
    $this->visit_data = array_merge($this->visit_data,
    [
        'device' => $UserAgentParser->device,
        'os' => $UserAgentParser->os,
        'browser' => $UserAgentParser->browser
    ]);

    // writing country, region, city, isp, latitude, longitude
    $IpInfo = new IpInfo($request_data['ip']);
    $this->visit_data = array_merge($this->visit_data,
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
    $this->visit_data['lang'] = $AcceptLanguage->getLanguage();

    // writing array action_data
    $this->action_data = array_merge($this->action_data, [
        'id_visit' => null,
        'action' => $request_data['action'],
        'body' => $request_data['body'],
        'date_action' => now()
    ]);
}

public function createVisit(): void {
    $id_visit = DB::table('analytics_scode_visits')->insertGetId($this->visit_data);
        // Rewriting $this->action_data['id_visit']
        $this->action_data['id_visit'] = $id_visit;
}

public function updateVisit(): void {
    $this->visit_data['score'] = $this->getScore() + 1;
    DB::table('analytics_scode_visits')
            ->where('id_visit', $this->action_data['id_visit'])
            ->update($this->visit_data);
}

public function createAction(): void {
    DB::table('analytics_scode_actions')->insert($this->action_data);
}

/** @return int id visit */
public function isIpExistToday() {
    $id_visit = DB::table('analytics_scode_visits')
             ->whereDate('date_visit', now()->format('Y-m-d'))
             ->where('ip', $this->visit_data['ip'])
             ->value('id_visit');
    // Rewriting $this->action_data['id_visit']
    $this->action_data['id_visit'] = $id_visit;
    return $id_visit;
}

/** @return int user score */
public function getScore() {
    return DB::table('analytics_scode_visits')
                ->where('id_visit', $this->action_data['id_visit'])
                ->value('score');
}

}
