<?php

namespace App\Http\Controllers;

use App\Models\Scode\Scode;
use App\Models\Scode\Stacker;
use App\Models\Scode\Controller;

class ScodeController extends Controller {  
   
public $action = null;

public function __construct() {
   $this->action = request('action');
}

public function search() {
   $scode = new Scode();
      return $scode->search(request()->all('scode'));
}

public function getAllScodes() {
      $objScode = new Scode();
         return $objScode->getAllScodes();             
}

public function getStackerComponents() {  
      $stacker = new Stacker();
         return $stacker->getStackerComponents();             
}

public function getControllerComponents() {  
      $controller = new Controller();
         return $controller->getControllerComponents();             
}

public function getControllerFunctions() {   
      $controller = new Controller();
         return $controller->getControllerFunctions();             
}

public function ScodeController() {

   // Save analytics
   // $AnalyticsController = new AnalyticsController();
   //       $AnalyticsController->saveServices();
   
   if($this->action == 'scode_search')
   {
      return $this->search();
   }
   elseif($this->action == 'scode_all') 
   {
      return $this->getAllScodes();
   }
   elseif($this->action == 'stacker_components') 
   {
      return $this->getStackerComponents();
   }
   elseif($this->action == 'controller_components') 
   {
      return $this->getControllerComponents();
   }
   elseif($this->action == 'controller_functions') 
   {
      return $this->getControllerFunctions();
   }
}


}
