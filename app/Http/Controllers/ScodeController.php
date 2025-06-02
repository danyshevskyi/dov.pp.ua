<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scode;

class ScodeController extends Controller
{
    function search(Request $request) {
       
       $objScode = new Scode();
        
       return $objScode->search($request->scode);          
          
        
    }
}
