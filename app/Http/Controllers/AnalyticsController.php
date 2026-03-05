<?php

namespace App\Http\Controllers;

use Analytics\App\Models\Count;
use App\Models\Analytics\AnalyticsModel;

class AnalyticsController extends Controller {

public function save_analytics($project) {
     
   // DOV Analytics
      $count = new Count($project, 'all');
            $count->count();
      
    // DOV Analytics 2.0
      $AnalyticsModel = new AnalyticsModel();
         $AnalyticsModel->create(request());
}         

}