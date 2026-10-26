<?php 

namespace App\Models\Analytics\Traits;

use Illuminate\Support\Facades\DB;

trait ActionTrait {

    public function saveAction($action_data): void {
        DB::table($this->table)->insert($action_data);
    }
    
    public function getAction($id_visit) {
        return DB::table($this->table)->where('id_visit', $id_visit)->get();
    }

}