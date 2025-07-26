<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function create_feedback(Request $request) {
        
        $user_id = $request->user_id;
        $project_id = $request->project_id;
        $feedback_text = $request->feedback_text;
        
            $feedback = new Feedback;
                $result = $feedback->create($user_id, $project_id, $feedback_text);
                
                $this->send_mail($user_id, $project_id, $feedback_text);
                
                    return json_encode(['status' => $result]);
    }
    
    public function send_mail($user_id, $project_id, $feedback_text) {
        
        // if($request->ip() != '127.0.0.1')
        if(true)
        {
            // $project = ucfirst($project);
    
            $to = "danishevskij@gmail.com";
            $subject = 'Feedback from '.$project_id;
    
            // Visit of Cards - Mountin View
            
            $message = "Feedback from user ".$user_id."<br>".$feedback_text;
            
            $header = "From: DOV Feedback <admin@dov.pp.ua> \r\n";
            $header .= "Cc:admin@dov.pp.ua \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";
            
            mail($to,$subject,$message,$header);
        }
    }
}
