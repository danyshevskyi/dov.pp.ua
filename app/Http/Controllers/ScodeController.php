<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scode;

class ScodeController extends Controller {

   public function search(Request $request) {
       
      $scode = new Scode();
        
       return $scode->search($request->scode);
       
    
    }

    public function getAllScodes() {
       
        $objScode = new Scode();
         
        return $objScode->getAllScodes();             
     }
}
