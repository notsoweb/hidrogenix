<?php namespace App\Http\Controllers\Dashboard;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification as Notification;
use Notsoweb\Core\Http\Controllers\VueController;

/**
 * Controlador muy simple de las notificaciones del usuario
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class NotificationController extends VueController
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->vueRoot('dashboard.notifications');
    }

    /**
     * Listar notificaciones usuario
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dateStart = request()->get('dateStart');
        $dateEnd = request()->get('dateEnd');

        if($dateEnd) {
            $dateEnd = date('Y-m-d', strtotime("{$dateEnd} + 1 day"));
        }

        $searcher = auth()
            ->user()
            ->notifications()
            ->latest();

        if($dateStart  && $dateEnd) {
            $searcher = $searcher->whereBetween('notifications.created_at', [$dateStart, $dateEnd]);
        } elseif($dateStart && !$dateEnd) {
            $searcher = $searcher->where('notifications.created_at', '>=', $dateStart);
        } elseif (!$dateStart && $dateEnd) {
            $searcher = $searcher->where('notifications.created_at', '<=', $dateEnd);
        }

        return $this->vuew('index', [
            'notifications' => $searcher->paginate(config('app.pagination'))
        ]);
    }

    /**
     * Marcar notificación como leída
     * 
     * Al entrar a ver los detalles de la notificación esta se marca como leída automáticamente.
     * Aprovechando el método post para no mostrar el ID.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $notification = Notification::find($data['id']);
        $notification->markAsRead();

        return $this->vuew('show', [
            'notification' => $notification
        ]);
    }

    /**
     * Marcar notificación como leída
     * 
     * Marca directamente una notificación como leída sin siquiera entrar a detalles.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Notification $notification Modelo de la notificación
     */
    public function update(Request $request, Notification $notification)
    {
        $notification->markAsRead();
    }

    /**
     * Eliminar notificación
     *
     * @param Notification $notification Modelo de la notificación
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();
    }
}
