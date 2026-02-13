<?php

namespace App\Models\Scode;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Controller extends Model
{
    public function getControllerComponents() {    
        $result = DB::table('scode_controller_components')->get();
            return $result;          
    }
}
