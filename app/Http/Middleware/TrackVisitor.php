<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Don't track AJAX requests or admin panel or common static files
        if ($request->ajax() || $request->is('admin*') || $request->is('livewire*')) {
            return $response;
        }

        try {
            $ip = $request->ip();
            $userAgent = $request->header('User-Agent');
            
            // Basic Device/OS/Browser detection
            $device = $this->getDevice($userAgent);
            $os = $this->getOS($userAgent);
            $browser = $this->getBrowser($userAgent);

            // Get location from Cache or API
            $location = Cache::remember('ip_location_' . $ip, 86400, function () use ($ip) {
                try {
                    // Using ip-api.com (free, no key required for low volume)
                    $res = Http::timeout(3)->get("http://ip-api.com/json/{$ip}");
                    if ($res->successful()) {
                        return $res->json();
                    }
                } catch (\Exception $e) {
                    // Fallback
                }
                return null;
            });

            Visitor::create([
                'ip_address'   => $ip,
                'country'      => $location['country'] ?? 'Unknown',
                'country_code' => $location['countryCode'] ?? '??',
                'city'         => $location['city'] ?? 'Unknown',
                'browser'      => $browser,
                'os'           => $os,
                'device'       => $device,
                'url'          => $request->fullUrl(),
                'referrer'     => $request->header('referer'),
                'user_agent'   => $userAgent,
                'visited_at'   => now(),
            ]);

        } catch (\Exception $e) {
            // Silently fail to not interrupt user experience
            logger()->error('Visitor Tracking Error: ' . $e->getMessage());
        }

        return $response;
    }

    private function getDevice($ua)
    {
        if (preg_match('/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i', $ua)) return 'Tablet';
        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', $ua)) return 'Mobile';
        return 'Desktop';
    }

    private function getOS($ua)
    {
        $os_array = [
            '/windows nt 10/i'      =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        ];
        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $ua)) return $value;
        }
        return 'Unknown OS';
    }

    private function getBrowser($ua)
    {
        $browser_array = [
            '/msie/i'      =>  'Internet Explorer',
            '/firefox/i'   =>  'Firefox',
            '/safari/i'    =>  'Safari',
            '/chrome/i'    =>  'Chrome',
            '/edge/i'      =>  'Edge',
            '/opera/i'     =>  'Opera',
            '/netscape/i'  =>  'Netscape',
            '/maxthon/i'   =>  'Maxthon',
            '/konqueror/i' =>  'Konqueror',
            '/mobile/i'    =>  'Handheld Browser'
        ];
        foreach ($browser_array as $regex => $value) {
            if (preg_match($regex, $ua)) return $value;
        }
        return 'Unknown Browser';
    }
}
