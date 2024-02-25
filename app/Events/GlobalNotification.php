<?php namespace App\Events;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Notificación global
 * 
 * Lanza notificaciones a todos los usuarios con sesión iniciada.
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class GlobalNotification implements ShouldBroadcast
{
    use Dispatchable,
        InteractsWithSockets,
        SerializesModels;

    /**
     * Crear nueva instancia del evento
     *
     * @param string $message El mensaje a transmitir
     * @param string $type El tipo de mensaje
     * @param string $timeout Tiempo en segundos
     */
    public function __construct(
        public $message,
        public $type = 'success',
        public $timeout = 15
    ) {}

    /**
     * Transmitir notificación por canal privado
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel("notifications");
    }
}
