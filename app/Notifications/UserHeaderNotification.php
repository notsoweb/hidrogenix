<?php namespace App\Notifications;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

/**
 * Notificación para usuario especifico
 * 
 * Notificación persistente para usuario especifico.
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class UserHeaderNotification extends Notification
{
    use Queueable;

    /**
     * Parámetros para detonar la notificación
     *
     * @return void
     */
    public function __construct(
        public string $message,
        public string $icon = 'notifications_active',
        public string $type = 'info',
        public int $timeout = 15
    ) {}

    /**
     * Canales de envió de la notificación
     *
     * @param  mixed  $notifiable
     */
    public function via($notifiable) : array
    {
        return [
            'broadcast',
            'database'
        ];
    }

    /**
     * Obtiene la representación del array de la notificación.
     *
     * @param  mixed  $notifiable
     * 
     * @return array
     */
    public function toArray($notifiable) : array
    {
        return [
            'message' => $this->message,
            'icon' => $this->icon,
            'type' => $this->type,
        ];
    }

    /**
     * Manda un mensaje por medio de un broadcast privado
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'message' => $this->message,
            'icon' => $this->type,
            'timeout' => $this->timeout
        ]);
    }
}
