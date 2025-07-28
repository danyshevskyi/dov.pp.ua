<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Sendemail;

class FeedbackController extends Controller
{
    public function create_feedback(Request $request) {
        
        $user_id = $request->user_id;
            $project_id = $request->project_id;
                $feedback_text = $request->feedback_text;
        
            $feedback = new Feedback;
                $result = $feedback->create($user_id, $project_id, $feedback_text);

            $sendemail = new Sendemail();
                $sendemail->feedback($user_id, $project_id, $feedback_text);               
                    
            return json_encode(['status' => $result]);
    }
    

}
