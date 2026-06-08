<?php

namespace App\Services\Analytics;

use App\Models\Analytics\AnalyticsModel;

class AnalyticsService {

public function startServices($request_data) {

    $AnalyticsModel = new AnalyticsModel($request_data);
   
    if(filled($AnalyticsModel->isIpExistToday()))
    {
        $AnalyticsModel->updateVisit();
            $AnalyticsModel->createAction();
            
    }
    else
    {
        $AnalyticsModel->createVisit();
            $AnalyticsModel->createAction();
    }
}

}
