<?php

namespace App\Http\Controllers;

use Analytics\App\Models\Count;
use App\Models\Scode\Scode;
use App\Models\Scode\Stacker;
use App\Models\Scode\Controller;
use App\Services\AnalyticsService;

class ScodeController extends Controller {

public function analytics() {
   $request = request();
      // DOV Analytics
      $count = new Count('scode', 'all');
            $count->count();
      // DOV Analytics 2.0
      $AnalyticsService = new AnalyticsService();
         $AnalyticsService->create($request);
}         

public function search() {
   $this->analytics(); // DOV Analytics
      $request = request();
         $scode = new Scode();
            return $scode->search($request->scode);
}

public function getAllScodes() {
   $this->analytics(); // DOV Analytics
      $objScode = new Scode();
         return $objScode->getAllScodes();             
}

public function getStackerComponents() {
   $this->analytics(); // DOV Analytics    
      $stacker = new Stacker();
         return $stacker->getStackerComponents();             
}

public function getControllerComponents() {
   $this->analytics(); // DOV Analytics    
      $controller = new Controller();
         return $controller->getControllerComponents();             
}

public function getControllerFunctions() {
   $this->analytics(); // DOV Analytics    
      $controller = new Controller();
         return $controller->getControllerFunctions();             
}

}
