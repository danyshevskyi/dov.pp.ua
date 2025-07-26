<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Feedback extends Model
{
    public function create($user_id, $project_id, $feedback_text) {
        return DB::table('feedback')->insert([
            'user_id' => $user_id,
            'project_id' => $project_id,
            'feedback_text' => $feedback_text,
            'created_at' => now()
        ]);
    }
}
