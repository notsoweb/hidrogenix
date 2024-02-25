<?php namespace App\Console\Commands;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use App\Models\User;
use App\Notifications\UserHeaderNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

/**
 * Lanza notificaciones a usuario especifico
 * 
 * La notificación queda guardada en las notificaciones del usuario.
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class UserNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:user
        {--email=developer@notsoweb.com : Correo del usuario}
        {--message=Prueba : Mensaje a enviar}
        {--type=info : Tipo de notificación}
        {--timeout=15 : Tiempo de notificación en segundos}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notificar algo a un usuario especifico mediante consola';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email   = $this->option('email');
        $message = $this->option('message');
        $type    = $this->option('type');
        $timeout = $this->option('timeout');

        if($email) {
            $user = User::where('email', $email)->first();

            if ($user) {
                $user->notify(new UserHeaderNotification(
                    message: $message,
                    icon: $type,
                    timeout: $timeout
                ));

                Log::channel('notify')->info("Mensaje privado enviado por consola a {$user->email}");

                return Command::SUCCESS;
            } else {
                $log = "El usuario {$user->email} no existe, mensaje por consola no enviado.";

                echo $log;
                Log::channel('notify')->error($log);
            }

        } else {
            echo "Se necesita escribir un correo";
        }

        return Command::INVALID;
    }
}
