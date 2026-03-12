<?php

namespace App\Http\Controllers\Feedback;

use Illuminate\Http\Request;
use App\Models\Feedback\Feedback;
use App\Models\Sendemail\Sendemail;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function create(Request $request) {
            $project_id = $request->project_id;
                $feedback_text = $request->feedback_text;
        
            $feedback = new Feedback;
                $result = $feedback->create($project_id, $feedback_text);

            $sendemail = new Sendemail();
                $sendemail->send_email($project_id, $feedback_text);               
                    
            return json_encode(['status' => $result]);
    }
}
