<?php namespace App\Console\Commands;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use Illuminate\Console\Command;

/**
 * Iniciar servicio de notificaciones
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class NotificationStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Iniciar servicio de notificaciones en tiempo real';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo shell_exec('pm2 start soketi --name notification-server -- start --config=soketi.json');
        
        return Command::SUCCESS;
    }
}
