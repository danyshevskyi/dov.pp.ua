<?php

namespace App\Models\Feedback;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Feedback extends Model
{
    public function create($project_id, $feedback_text) {
        return DB::table('feedback')->insert([
            'user_id' => null,
            'project_id' => $project_id,
            'feedback_text' => $feedback_text,
            'created_at' => now()
        ]);
    }
}
