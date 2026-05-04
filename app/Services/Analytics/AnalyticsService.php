<?php

namespace App\Services\Analytics;

class AnalyticsService
{
    public $ip;
    
    public function __construct($ip)
    {
        $this->ip = $ip;
    }
}
