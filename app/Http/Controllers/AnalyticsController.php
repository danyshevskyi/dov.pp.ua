<?php

namespace App\Http\Controllers;

use Analytics\App\Models\Count;
use App\Models\Analytics\AnalyticsModel;
use Illuminate\Http\Request;

class AnalyticsController extends Controller {

public $data = ['ip' => '127.0.0.1'];

public function store(Request $request) {
   
   $data['ip'] = $request->ip();
}

public function CreateAnalytics($project) {

      $AnalyticsModel = new AnalyticsModel();
         $AnalyticsModel->CreateAnalytics(request());
}         

}
