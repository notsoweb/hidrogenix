<?php namespace App\Http\Traits;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use Illuminate\Support\Facades\Log;

 /**
 * Conjunto de funciones para automatizar el manejo de rutas de vistas de vue en los 
 * controladores asemejando la forma de llamar a las vistas a la de blade.
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * @version 1.0.0
 */
trait ReportAction
{
    /**
     * Reporta una cantidad de algo
     * 
     * @version 1.0.0
     * 
     * @param string $action Accion completa
     * @param array $json Array de datos
     * @param int $qty Cantidad de datos
     * @param string $context Información adicional
     */
    public function reportQty(string $action, array $json = [], int $qty = 1, string $attribute = null) : void
    {
        Log::channel('report')->info($attribute ,[
            'qty' => $qty,
            'action'=> $action,
            'data' => $json
        ]);
    }

    /**
     * Reporta la duplicación de un registro
     * 
     * @version 1.0.0
     * 
     * @param string $module Modulo sobre el que se desencadena la acción
     * @param array $json Array de datos
     * @param string $context Información adicional
     */
    public function reportDuplicated(string $module, array $json, string $context = null) : void
    {
        $this->reportQty(
            action:"{$module}.duplicated",
            json: $json,
            attribute: $context
        );
    }

    /**
     * Reporta la creación de un registro
     * 
     * @version 1.0.0
     * 
     * @param string $module Modulo sobre el que se desencadena la acción
     * @param array $json Array de datos
     * @param string $context Información adicional
     */
    public function reportCreate(string $module, array $json, string $context = null) : void
    {
        $this->reportQty(
            action:"{$module}.created",
            json: $json,
            attribute: $context
        );
    }

    /**
     * Reporta la actualización de un registro
     * 
     * @version 1.0.0
     * 
     * @param string $module Modulo sobre el que se desencadena la acción
     * @param array $json Array de datos
     * @param string $context Información adicional
     */
    public function reportUpdate(string $module, array $json, string $context = null) : void
    {
        $this->reportQty(
            action:"{$module}.updated",
            json: $json,
            attribute: $context
        );
    }

    /**
     * Reporta la eliminación de un registro
     * 
     * @version 1.0.0
     * 
     * @param string $module Modulo sobre el que se desencadena la acción
     * @param array $json Array de datos
     * @param string $context Información adicional
     */
    public function reportDestroy(string $module, array $json, string $context = null) : void
    {
        $this->reportQty(
            action:"{$module}.destroyed",
            json: $json,
            attribute: $context
        );
    }
}