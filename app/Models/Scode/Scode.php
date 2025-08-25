<?php

namespace App\Models\Scode;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Scode extends Model {

    function search($scode) {
        $result = DB::table('scode_list_scodes')->where('scode', $scode)->first();
            return json_encode($result);  
    }
        
    function getAllScodes() {
        $result = DB::table('scode_list_scodes')->get();
            return $result;
    }

}
