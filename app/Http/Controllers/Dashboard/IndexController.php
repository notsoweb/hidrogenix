<?php namespace App\Http\Controllers\Dashboard;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use Notsoweb\Core\Http\Controllers\VueController;

/**
 * Controlador de la página de inicio del dashboard del usuario
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class IndexController extends VueController
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->vueRoot('dashboard');
    }

    /**
     * Página de inicio
     */
    public function index()
    {
        return $this->vuew('index');
    }
}
