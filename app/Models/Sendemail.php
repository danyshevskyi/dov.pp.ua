<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sendemail extends Model

// $sendemail->feedback($user_id, $project_id, $feedback_text);

{
    public function feedback($user_id, $project_id, $feedback_text) {

        // Get email user
        $email = DB::table('users')->where('id', $user_id)->value('email');

        //Get project name
        $project = DB::table('projects')->where('id', $project_id)->value('name');

        // Sending notification to email
        
        // if($request->ip() != '127.0.0.1')
        if(true)
        {
            // $project = ucfirst($project);

            $to = "danishevskij@gmail.com";
            $subject = 'Feedback for '.$project;

            // Visit of Cards - Mountin View
            
            $message = "<h3>User ".$email." sent feedback!<br><br></h3><h4>".$feedback_text."</h4>";
            
            $header = "From: DOV Feedback <admin@dov.pp.ua> \r\n";
            $header .= "Cc:admin@dov.pp.ua \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";
            
            mail($to,$subject,$message,$header);
        }

    }
}