<?php

namespace App\Models\Sendemail;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sendemail extends Model

{
    public function send_email($project_id, $feedback_text) {

        // Get email user
        // $email = DB::table('users')->where('id', $user_id)->value('email');
  
        // Get name user
        // $name = DB::table('users')->where('id', $user_id)->value('name');

        //Get project name
        $project = DB::table('projects')->where('id', $project_id)->value('name');

        // Sending notification to email
        $to = "danishevskij@gmail.com";
        $subject = "Project: ". $project; 
            $message = $feedback_text;
                $header = "From: DOV Feedback <admin@dov.pp.ua> \r\n";
                $header .= "Cc:admin@dov.pp.ua \r\n";
                $header .= "MIME-Version: 1.0\r\n";
                $header .= "Content-type: text/html\r\n";
        mail($to,$subject,$message,$header);
    }
}
