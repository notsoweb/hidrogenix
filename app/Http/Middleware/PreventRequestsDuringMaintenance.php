<?php

namespace App\Http\Middleware;

use App\Http\MaintenanceModeBypassCookie;
use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];

    /**
     * Configura el secreto de forma personalizada con una duración de tiempo
     * personalizada en las variables de entorno.
     */
    protected function bypassResponse(string $secret)
    {
        return redirect('/')->withCookie(
            MaintenanceModeBypassCookie::create($secret)
        );
    }
}
