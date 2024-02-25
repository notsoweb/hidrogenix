<?php namespace App\Listeners;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use App\Events\GlobalNotification;
use Illuminate\Auth\Events\Login;

/**
 * Escucha el inicio de sesión de los usuarios
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class BrodcastUserLoginNotification
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
     * Transmite mediante el evento cambio de sesión un mensaje de inicio de sesión
     *
     * @param  object  $event
     */
    public function handle(Login $event) : void
    {
        if(config('app.notifications')) {
            broadcast(new GlobalNotification(
                __('notifications.user.login', [
                    'user' => $event->user->name
                ]),
                'info'
            ));
        }
    }
}
