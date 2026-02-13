<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scode\Scode;
use App\Models\Scode\Stacker;
use App\Models\Scode\Controller;

class ScodeController extends Controller {

public function search(Request $request) {
   $scode = new Scode();
      return $scode->search($request->scode);   
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

}
