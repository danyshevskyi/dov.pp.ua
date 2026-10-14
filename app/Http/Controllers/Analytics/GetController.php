<?php

namespace App\Http\Controllers\Analytics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Analytics\GetService;

class GetController extends Controller
{

public $data_from_request = [];

public function __construct() {
   $this->data_from_request =
   [
      'project'=>request('project'),
      'period'=>request('period'),
      'key'=>request('key')
   ];
}

public function getServices() {
   $GetService = new GetService($this->data_from_request);
      $response = $GetService->getAnalytics();

      return response()->json($response);
}

}
