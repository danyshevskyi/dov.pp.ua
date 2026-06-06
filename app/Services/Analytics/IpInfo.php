<?php

namespace App\Services\Analytics;

use Illuminate\Support\Facades\Http;

class IpInfo {

public $country;
public $region;
public $city;
public $isp;
public $latitude;
public $longitude;

public function __construct($ip)
{
    $response = Http::withoutRedirecting()
    ->get('http://ip-api.com/json/' . $ip, [
        'fields' => 'status,message,country,regionName,city,lat,lon,as,mobile'
    ]);
        $info = $response->json();
            $this->country = $info['country'];
            $this->region = $info['regionName'];
            $this->city = $info['city'];
            $this->isp = $info['as'];
            $this->latitude = $info['lat'];
            $this->longitude = $info['lon'];
}

}
