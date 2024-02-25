<?php namespace App\Http\Controllers;
/**
 * @copyright Copyright (c) 2001-2022 Golsystems (https://www.golsystems.mx) - All rights reserved.
 */

use App\Http\Traits\UseFetch;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

/**
 * Permite traer recursos estáticos que son solo para consulta
 * 
 * Retorna la información necesaria para los select, listas o recursos determinados.
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class ResourceController extends Controller
{
    use UseFetch;

    /**
     * Retornar todos los roles del usuario
     * 
     * @param int $user ID del usuario a buscar roles
     */
    public function rolesByUser($user) : JsonResponse
    {
        try {
            $model = User::find($user);
    
            return $this->successFetch([
                'roles' => $model->roles
            ]);
        } catch (\Throwable $th) {
            $this->reportError($th, __METHOD__);

            return $this->errorFetch(__('The user does not exist'));
        }
    }

    /**
     * Crear log de errores de este controlador
     * 
     * @param object $th Contiene todos los detalles del error
     * @param string $method Función del controlador sobre la que ocurrió el error
     */
    private function reportError($th, $method) : void
    {
        Log::channel('resources')->error("Method: $method");
        Log::channel('resources')->error($th->getMessage());
    }
}
