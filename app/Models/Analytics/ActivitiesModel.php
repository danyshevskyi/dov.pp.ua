<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ActivitiesModel extends Model
{

public $table;

public function __construct($table) {
    $this->table = $table;
}

public function saveActivity($activity_data): void {
    DB::table($this->table)->insert($activity_data);
}

}
