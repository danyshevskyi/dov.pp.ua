<?php

namespace App\Http\Controllers;

use App\Services\Analytics\AnalyticsService;
use App\Services\Analytics\GetService;
use Illuminate\Http\Request;

class AnalyticsController extends Controller {

/** @var array
 * ip
 * user_agent
 * referer 
 * project
 * activity
 * body
 * */
public $request_data = [];

public function __construct() {
   $this->request_data =
   [
      'ip' => request()->ip(),
      'user_agent' => request()->userAgent(),
      'referer' => request()->headers->get('referer'),
      // 'project'=>request()->input('project'),
      'project'=>request()->segment(2),
      'period'=>request()->input('period'),
      'key'=>request()->input('key'),
      // 'activity'=>request('request'),
      'action'=>request('action'),
      'is_action'=>request('is_action'),
      'body'=>request('scode')
   ];
}

public function saveServices() {
   $AnalyticsService = new AnalyticsService($this->request_data);
      $AnalyticsService->saveAnalytics();
}

public function getServices() {
   $GetService = new GetService($this->request_data);
      $response = $GetService->getAnalytics();

      return response()->json($response);
}

}
