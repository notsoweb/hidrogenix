<?php namespace App\Services\Logs;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use Monolog\Logger;

/**
 * Dispara el LOG
 * 
 * Controla el flujo del registro del LOG.
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class LogMonolog
{
    /**
     * Create a custom Monolog instance.
     *
     * @param  array  $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        $logger = new Logger('custom');
        $logger->pushProcessor(new LogProcessor());
        $logger->pushHandler(new LogHandler());

        return $logger;
    }
}