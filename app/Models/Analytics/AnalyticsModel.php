<?php

namespace App\Models\Analytics;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use \foroco\BrowserDetection;
use \Kudashevs\AcceptLanguage\AcceptLanguage;
use Illuminate\Support\Facades\Http;


class AnalyticsModel extends Model {

// public function create(Request $request) {
//     return DB::table('analytics_requests_scodes')->insert([
//         'ip'   => $request->ip(),
//         'url'  => $request->segment(4),
//         'body' => json_encode($request->all(), JSON_UNESCAPED_UNICODE)
//     ]);
// }

public function CreateAnalytics(Request $request) {

    $BrowserDetection = new BrowserDetection();
        $AcceptLanguage = new AcceptLanguage();
            $userAgent = request()->userAgent();

    $device = $BrowserDetection->getDevice($userAgent);
        $os = $BrowserDetection->getOS($userAgent);
            $browser = $BrowserDetection->getBrowser($userAgent);
                $infoAboutIp = $this->getInfoAboutIp($request->ip());
                    $AcceptLanguage->process();

    return DB::table('analytics_scode_visits')->insert([
        'ip'   => $request->ip(),
        'device' => ucfirst($device['device_type']),
        'os' => $os['os_title'],
        'browser' => $browser['browser_title'],
        'country' => $infoAboutIp['country'],
        'region' => $infoAboutIp['regionName'],
        'city' => $infoAboutIp['city'],
        'lang' => $AcceptLanguage->getLanguage(),
        'referer' => $_SERVER['HTTP_REFERER'],
        'score' => 1,
        'isp' => $infoAboutIp['as'],
        'latitude' => $infoAboutIp['lat'],
        'longitude' => $infoAboutIp['lon'],
        'date_activity' => now()
    ]);
}

public function getInfoAboutIp($ip) {
    $response = Http::withoutRedirecting()
    ->get('http://ip-api.com/json/' . $ip, [
        'fields' => 'status,message,country,regionName,city,lat,lon,as,mobile'
    ]);
    return $response->json();
}

public function isIpExistToday($ip): bool {
    return true;
}

public function isAuth() { // return email or null
    return true;
}
 
 public function createVisit() {
 
 }
 
 public function updateVisit() {
 
 }
 
 public function createEvent() {
 
}

}