<?php

namespace App\Http\Controllers;

use Analytics\App\Models\Count;
use App\Models\Analytics\AnalyticsModel;
use App\Services\Analytics\AnalyticsService;
use Illuminate\Http\Request;

class AnalyticsController extends Controller {

/** @var array  ip, user_agent, referer */
public $request_data = [];

public function __construct() {
   $this->request_data =
   [
      'ip' => request()->ip(),
      'user_agent' => request()->userAgent(),
      'referer' => request()->headers->get('referer')
   ];
}

public function startServices(Request $request) {
   $AnalyticsService = new AnalyticsService($this->request_data);
      $AnalyticsService->startServices($request);
} 

public function CreateAnalytics($project) {

      $AnalyticsModel = new AnalyticsModel();
         $AnalyticsModel->CreateAnalytics(request());
}         

}