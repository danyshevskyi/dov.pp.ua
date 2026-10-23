<?php

namespace App\Services\Analytics;

// use App\Models\Analytics\AnalyticsScodeActions;
// use App\Models\Analytics\AnalyticsScodeVisits;
use App\Models\Analytics\ProjectsModel;

class GetService
{
    public $key = null; // dashboard, scode
    public $project = null; // total, scode, miles, dov
    public $period = null; // today, yesterday, current_month, last_month

    public function __construct($request_data)
    {
        $this->key = $request_data['key'];
        $this->project = $request_data['project'];
        $this->period = $request_data['period'];   
    }

    public function getAnalytics() {

        $response = [];

        if($this->key == 'dashboard')
        {
            $ProjectsModel = new ProjectsModel();   
                $projects = $ProjectsModel->getProject('all');
            
            foreach($projects as $project)
            {
                    $nameVisitsModal = 'App\\Models\\Analytics\\Analytics'.ucfirst($project->key_name).'Visits';
                        $VisitsModel = new $nameVisitsModal();
                            $visits = $VisitsModel->getVisits('today');

                    $response[$project->name] = $this->visitsTotal($visits);
                        $response[$project->name]['key_project'] = $project->key_name;
            }
    
        }
        elseif($this->key == 'details')
        {
            $ProjectsModel = new ProjectsModel();
                $response['project'] = $ProjectsModel->getProject($this->project);

            
                $nameVisitsModal = 'App\\Models\\Analytics\\Analytics'.ucfirst($this->project).'Visits';
                    $VisitsModal = new $nameVisitsModal();
                        $response['visits'] = $VisitsModal->getVisits($this->period);
            
                $response['total'] = $this->visitsTotal($response['visits']);              
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
