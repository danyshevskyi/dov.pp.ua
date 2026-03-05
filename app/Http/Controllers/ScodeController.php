<?php
namespace App\Http\Controllers;

use App\Models\Scode\Scode;
use App\Models\Scode\Stacker;
use App\Models\Scode\Controller;

class ScodeController extends Controller {        

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

}
