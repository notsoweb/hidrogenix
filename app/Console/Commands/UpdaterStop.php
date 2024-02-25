<?php namespace App\Console\Commands;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use Illuminate\Console\Command;

/**
 * Detener servicio de actualización automática
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class UpdaterStop extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updater:stop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Detener servicio de actualización automática';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        shell_exec("pm2 delete updater");
        
        return Command::SUCCESS;
    }
}
