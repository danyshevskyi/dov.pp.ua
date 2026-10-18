<?php

namespace App\Http\Controllers\Analytics;

use App\Services\Analytics\AnalyticsService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaveController extends Controller
{

/** @var array
 * ip
 * user_agent
 * referer 
 * project
 * activity
 * body
 **/
public $request_data = [];

public function __construct() {
   $this->request_data =
   [
      'ip' => request()->ip(),
      'user_agent' => request()->userAgent(),
      'referer' => request()->headers->get('referer'),
      'period'=>request()->input('period'),
      'key'=>request()->input('key'),
      // 'activity'=>request('request'),
      'project'=>request('project'),
      'action_name'=>request('action_name'),
      'action_data'=>request('action_data'),
      'is_action_save'=>request('is_action_save')
   ];
}

public function saveServices() {
   $AnalyticsService = new AnalyticsService($this->request_data);
      $AnalyticsService->saveAnalytics();
}
}
