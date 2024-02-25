<?php namespace App\Services\Logs;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use Monolog\LogRecord;

 /**
 * Modifica o agrega datos
 * 
 * Agrega o modifica los datos del context del log.
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class LogProcessor
{
    public function __invoke(LogRecord $record)
    {
        return $record;
    }
}