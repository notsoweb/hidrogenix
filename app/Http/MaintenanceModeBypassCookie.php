<?php

namespace App\Http;

use Illuminate\Foundation\Http\MaintenanceModeBypassCookie as HttpMaintenanceModeBypassCookie;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Cookie;

class MaintenanceModeBypassCookie extends HttpMaintenanceModeBypassCookie
{
    /**
     * Create a new maintenance mode bypass cookie.
     *
     * @param  string  $key
     * @return \Symfony\Component\HttpFoundation\Cookie
     */
    public static function create(string $key)
    {
        $expiresAt = Carbon::now()->addHours(config('app.maintenance.lifetime'));//Time expiration for your cookie

        return new Cookie('laravel_maintenance', base64_encode(json_encode([
            'expires_at' => $expiresAt->getTimestamp(),
            'mac' => hash_hmac('sha256', $expiresAt->getTimestamp(), $key),
        ])), $expiresAt);
    }
}