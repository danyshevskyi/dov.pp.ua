<?php

namespace App\Http\Controllers;

use App\Services\Analytics\AnalyticsService;
use Illuminate\Http\Request;

class AnalyticsController extends Controller {

/** @var array
 * ip
 * user_agent
 * referer 
 * action
 * body
 * */
public $request_data = [];

public function __construct() {
   $this->request_data =
   [
      'ip' => request()->ip(),
      'user_agent' => request()->userAgent(),
      'referer' => request()->headers->get('referer'),
      'action'=>request()->segment(4),
      'body'=>json_encode(request()->all(), JSON_UNESCAPED_UNICODE)
   ];
}

public function startServices() {
   $AnalyticsService = new AnalyticsService();
      $AnalyticsService->startServices($this->request_data);
}       

}
