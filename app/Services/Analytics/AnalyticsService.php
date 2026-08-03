<?php

namespace App\Services\Analytics;

use App\Models\Analytics\ScodeActivitiesModel;
use App\Models\Analytics\ScodeVisitsModel;
use \Kudashevs\AcceptLanguage\AcceptLanguage;
use App\Services\Analytics\IpInfo;
use App\Services\Analytics\UserAgentParser;

class AnalyticsService {

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
     * activity
     * body
     * date_activity
     */
    public $activity_data = [];

    public function __construct($request_data) {

        // writing array visit_data
        $this->visit_data = array_merge($this->visit_data,
        [
            'ip' => $request_data['ip'],
            'referer' => $request_data['referer'],
            'score' => 1, // default value
            'date_visit' => now()
        ]);
    
        $UserAgentParser = new UserAgentParser($request_data['user_agent']);
        $this->visit_data = array_merge($this->visit_data,
        [
            'device' => $UserAgentParser->device,
            'os' => $UserAgentParser->os,
            'browser' => $UserAgentParser->browser
        ]);
    
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
    
        $AcceptLanguage = new AcceptLanguage();
        $AcceptLanguage->process();
        $this->visit_data['lang'] = $AcceptLanguage->getLanguage();

        // writing array activity_data
        $this->activity_data = array_merge($this->activity_data, [
            'id_visit' => null,
            'activity' => $request_data['activity'],
            'body' => $request_data['body'],
            'date_activity' => now()
        ]);
    }

public function startServices() {

    $ScodeActivitiesModel = new ScodeActivitiesModel();
        $ScodeVisitsModel = new ScodeVisitsModel();


    $visit_in = $ScodeVisitsModel->isIpExistToday($this->visit_data['ip']);

    // var_dump($visit_in->id_visit);
   
    if(filled($visit_in))
    {
        $ScodeVisitsModel->updateVisit($visit_in, $this->visit_data);
            $ScodeActivitiesModel->saveActivity($this->activity_data);
            
    }
    else
    {
        $ScodeVisitsModel->saveVisit($this->visit_data);
            $ScodeActivitiesModel->saveActivity($this->activity_data);
    }
}

}
