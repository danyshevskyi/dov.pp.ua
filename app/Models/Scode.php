<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Scode extends Model
{
    function search($scode) {
        
        $scodeResult = DB::table('scodes')->where('scode', $scode)->first();

            return json_encode([
                'status' => true,
                'data'=> $scodeResult,
                'comments'=>'Test comments',
                'error' => null
            ]);  
        
       
    }

    function getAllScodes() {
        
        $result = DB::table('scodes')->get();

            // return json_encode([
            //     'status' => true,
            //     'data'=> $result,
            //     'error' => null
            // ]);

            return $result;
        
       
    }
}
