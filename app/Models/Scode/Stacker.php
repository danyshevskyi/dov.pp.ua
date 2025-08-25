<?php

namespace App\Models\Scode;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Stacker extends Model
{
    public function getStackerComponents() {    
        $result = DB::table('scode_stacker_components')->get();
            return $result;          
    }
}
