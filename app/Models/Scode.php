<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Scode extends Model
{
    function search($scode) {
        
        $scodeResult = DB::table('scodes')->where('scode', $scode)->first();

            if ($scodeResult == null) {
                $status = false;
            } else {
                $status = true;
            };
        
            return json_encode([
                'status' => $status,
                'data'=> $scodeResult,
                'comments'=>'Test comments',
                'error' => 'Вказаний scode не знайдений ...'
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
