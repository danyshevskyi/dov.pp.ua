<?php

namespace App\Services\Analytics;

use \foroco\BrowserDetection;

class UserAgentParser
{
    public $device;
    public $os; 
    public $browser;

    public function __construct($user_agent) {

        $BrowserDetection = new BrowserDetection();
        
        $device = $BrowserDetection->getDevice($user_agent);
            $os = $BrowserDetection->getOS($user_agent);
                $browser = $BrowserDetection->getBrowser($user_agent);

        $this->device = ucfirst($device['device_type']);
        $this->os = $os['os_title'];
        $this->browser = $browser['browser_title']; 
     }
}
