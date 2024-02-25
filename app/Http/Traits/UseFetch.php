<?php namespace App\Http\Traits;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use Illuminate\Http\JsonResponse;

 /**
 * Permite comunicarse con el componente useFetch javascript.
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * @version 1.0.0
 */
trait UseFetch
{
    /**
     * Retorna un mensaje de error para fetch
     * 
     * Para aquellas peticiones realizadas por medio de la función fetch en javascript que
     * requieran retornar un error.
     * 
     * @version 1.0.0
     * 
     * @return \Illuminate\Http\JSONResponse
     */
    public function errorFetch($message = null) : JsonResponse
    {
        if (!$message) {
            $message = __("Resource not found");
        }

        return response()->json([
            'status' => 404,
            'message' => $message
        ], 404);
    }

    /**
     * Retorna un mensaje de error para fetch
     * 
     * Para aquellas peticiones realizadas por medio de la función fetch en javascript que
     * requieran retornar un error.
     * 
     * @version 1.0.0
     * 
     * @return \Illuminate\Http\JSONResponse
     */
    public function successFetch(array $data = []) : JsonResponse
    {
        return response()->json(array_merge([
            'status' => 200,
        ], $data));
    }
}