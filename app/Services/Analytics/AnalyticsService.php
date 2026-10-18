<?php

namespace App\Services\Analytics;

use App\Models\Analytics\ActionsModel;
use App\Models\Analytics\VisitsModel;
use App\Models\Analytics\ProjectsModel;
use \Kudashevs\AcceptLanguage\AcceptLanguage;
use App\Services\Analytics\IpInfo;
use App\Services\Analytics\UserAgentParser;

// use App\Models\Analytics\AnalyticsScodeVisits;

class AnalyticsService
{
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
     * action_name
     * action_data
     * action_date
     */
    public $action_data = [];

    public $project = null;
    public $period = null;
    public $isActionSave = null;

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

        // writing array action_data
            $this->action_data = array_merge($this->action_data, [
                'id_visit' => null,
                'action_name' => $request_data['action_name'],
                'action_data' => $request_data['action_data'],
                'action_date' => now()
            ]);

        // data from post and get
            $this->key = $request_data['key'];
            $this->project = $request_data['project'];
            $this->period = $request_data['period'];
            $this->isActionSave = $request_data['is_action_save'];
    }

    public function saveAnalytics() {

        $ActionsModel = new ActionsModel('analytics_'.$this->project.'_actions');
            $visitsModel = new VisitsModel('analytics_'.$this->project.'_visits');

            $visit_in = $visitsModel->isIpExistToday($this->visit_data['ip']);
    
        if(filled($visit_in))
        {
            $this->action_data['id_visit'] = $visit_in->id_visit;
                $visitsModel->updateVisit($visit_in, $this->visit_data);     
        }
        else
        {
            $id_visit = $visitsModel->saveVisit($this->visit_data);
                $this->action_data['id_visit'] = $id_visit;
        }
        
        // Don't save action
        if($this->isActionSave) {
            $ActionsModel->saveAction($this->action_data);
        }
    }

    // project: total, scode, miles, dov
    // period: today, yesterday, current_month, last_month
    public function getAnalytics() {

        if($this->key == 'dashboard')
        {
            $response = [];

            $ProjectsModel = new ProjectsModel();   
                $projects = $ProjectsModel->getProject('all');
            
            foreach($projects as $project)
            {
                if($project->key_name == "scode")
                {
                    $VisitsModel = new VisitsModel('analytics_'.$project->key_name.'_visits');
                        $visits = $VisitsModel->getVisits('today');

                        $response[$project->name] = $this->visitsTotal($visits);
                }       
            }
    
        }
        elseif($this->key == 'details')
        {
            if($this->project == "scode")
            {

                $ProjectsModel = new ProjectsModel();
                    $response['project'] = $ProjectsModel->getProject($this->project);

                $VisitsModel = new VisitsModel();
                    $response['visits'] = $VisitsModel->getVisits($this->period);
                
                $response['total'] = $this->visitsTotal($response['visits']);              
            }
        }   

        return $response;
    }

    // auxiliary functions
    public function visitsOnline($visits) {
        $online = 0;
        foreach($visits as $visit)
        {
            if(strtotime($visit->date_visit) >= strtotime('-5 minutes'))
            {
                $online ++;
            }
        }
        return $online;
    }

    public function visitsReg($visits) {
        $reg = 0;
        foreach($visits as $visit)
        {
            if($visit->email)
            {
                $reg ++;
            }
        }
        return $reg;
    }

    public function visitsTotal($visits) {
        return [
                'today' => $visits->count(),
                'reg'=> $this->visitsReg($visits),
                'online'=> $this->visitsOnline($visits)
        ];
    }
}
