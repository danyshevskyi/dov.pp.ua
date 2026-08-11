<?php

namespace App\Services\Analytics;

use App\Models\Analytics\ActivitiesModel;
use App\Models\Analytics\VisitsModel;
use App\Models\Analytics\ProjectsModel;
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
    
    public $project = null;

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
    // writing variable project
        $this->project = $request_data['project'];
    }

public function saveAnalytics() {

    $activitiesModel = new ActivitiesModel('analytics_scode_activities');
        $visitsModel = new VisitsModel('analytics_scode_visits');


    $visit_in = $visitsModel->isIpExistToday($this->visit_data['ip']);

    // var_dump($visit_in->id_visit);
   
    if(filled($visit_in))
    {
        $this->activity_data['id_visit'] = $visit_in->id_visit;
            $visitsModel->updateVisit($visit_in, $this->visit_data);
                $activitiesModel->saveActivity($this->activity_data);
            
    }
    else
    {
        $id_visit = $visitsModel->saveVisit($this->visit_data);
            $this->activity_data['id_visit'] = $id_visit;
                $activitiesModel->saveActivity($this->activity_data);
    }
}

public function getAnalytics() {

    if($this->project == 'total') {
        
        $ProjectsModel = new ProjectsModel();   
            $projects = $ProjectsModel->getProjects();
        
        
        $response = [];



            // if($projects->key_name == 'scode') {
            //     foreach($projects as $project) {
            //         $response[$project->name] = 11;
            //     }
            // }

           

            // analytics_scode_visits

                foreach($projects as $project) {
                    

                    if($project->key_name == "scode") {
                        $response[$project->name] = $project->key_name;






                    }

                    
                }
            
        
        
        // $total = [
        //     "Miles" => [],
        //     "WEB Analytics" => [],
        //     "DOV Software" => [],
        //     "English Cards" => [],
        //     "Scode" => ["Today" => 555, "Reg" => 555, "Online" => 555]
        // ];
        // return $total;

        return $response;
    }
}








}
