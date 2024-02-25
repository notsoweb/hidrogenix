<?php namespace App\Services;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use Inertia\Inertia;

 /**
 * Permite enviar notificaciones mediante inertia
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class Notify
{
    /**
     * Notificación exitosa
     */
    const SUCCESS = 'success';

    /**
     * Notificación de error
     */
    const ERROR = 'error';

    /**
     * Notificación informativa
     */
    const INFO = 'info';

    /**
     * Notificación de advertencia
     */
    const WARNING = 'warning';

    /**
    * Inertia Flash
    *
    * Crea una notificación procesable por INERTIA para la siguiente petición
    * realizada en el FRONTEND
    *
    * @version 1.0.0
    *
    * @param  string  $message Mensaje
    * @param  string  $type Tipo
    * @param  string  $key Llave de guardado
    */
    public static function send($message, $type = 'success', $key = 'flash') : void
    {
        $old = Inertia::getShared($key, null);
        
        $data = [
            'type' => $type,
            'message' => $message,
        ];

        if($old) {
            Inertia::share($key, array_merge($old, [$data]));
        } else {
            Inertia::share($key, [$data]);
        }
    }

    /**
     * Notifica algo exitoso
     * 
     * @param string $message Mensaje
     */
    public static function success($message) : void
    {
        self::send(
            message: $message,
            type: self::SUCCESS
        );
    }

    /**
     * Notifica un error
     * 
     * @param string $message Mensaje
     * @return void
     */
    public static function error($message) : void
    {
        self::send(
            message: $message,
            type: self::ERROR
        );
    }

    /**
     * Notifica algo informativo
     * 
     * @param string $message Mensaje
     */
    public static function info($message) : void
    {
        self::send(
            message: $message,
            type: self::INFO
        );
    }

    /**
     * Notifica una advertencia
     * 
     * @param string $message Mensaje
     */
    public static function warning($message) : void
    {
        self::send(
            message: $message,
            type: self::WARNING
        );
    }
}