<?php

namespace App\Http\Controllers;

use App\Services\Analytics\AnalyticsService;
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
      'project'=>request()->segment(3),
      'activity'=>request()->segment(5),
      'body'=>json_encode(request()->all(), JSON_UNESCAPED_UNICODE)
   ];
}

public function saveServices() {
   $AnalyticsService = new AnalyticsService($this->request_data);
      $AnalyticsService->saveAnalytics();
}

public function getServices() {
   $AnalyticsService = new AnalyticsService($this->request_data);
      $response = $AnalyticsService->getAnalytics();

      return response()->json($response);
}

}
