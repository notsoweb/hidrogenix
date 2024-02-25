<?php namespace App\Console\Commands;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use Illuminate\Console\Command;

/**
 * Instala dependencias especiales
 * 
 * Instala los componentes necesarios para que funcionen las notificaciones en tiempo real y la
 * actualización en tiempo real.
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class NotsowebInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notsoweb:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Instala los servicios necesarios para las notificaciones y actualizaciones en tiempo real';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo shell_exec('npm install -g @soketi/soketi');
        echo shell_exec('npm install -g pm2');
        
        return Command::SUCCESS;
    }
}
