<?php namespace App\Listeners;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use App\Events\GlobalNotification;
use Illuminate\Auth\Events\Logout;

/**
 * Escucha el cierre de Session de un usuario
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class BrodcastUserLogoutNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Disparador
     * 
     * Transmite mediante el evento cambio de sesión un mensaje de cierre de sesión
     *
     * @param  object  $event
     */
    public function handle(Logout $event) : void
    {
        if(config('app.notifications')) {
            broadcast(new GlobalNotification(
                __('notifications.user.logout', [
                    'user' => $event->user->name
                ]),
                'info'
            ));
        }
    }
}
