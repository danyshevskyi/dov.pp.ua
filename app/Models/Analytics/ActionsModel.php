<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ActionsModel extends Model
{

public $table;

public function __construct($table) {
    $this->table = $table;
}

public function saveAction($action_data): void {
    DB::table($this->table)->insert($action_data);
}

public function getAction($id_visit) {
    return DB::table($this->table)->where('id_visit', $id_visit)->get();
}

}
