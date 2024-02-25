<?php namespace App\Http\Controllers\Web;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use Illuminate\Http\Request;
use Notsoweb\Core\Http\Controllers\VueController;

/**
 * Descripción
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class MainController extends VueController
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->vueRoot('web');
    }

    /**
     * Página de inicio
     */
    public function index()
    {
        return $this->vuew('index');
    }

    /**
     * Acerca de nosotros
     */
    public function about()
    {
        return $this->vuew('index');
    }

    /**
     * Acerca de nosotros
     */
    public function products()
    {
        return $this->vuew('index');
    }

    /**
     * Acerca de nosotros
     */
    public function news()
    {
        return $this->vuew('index');
    }

    /**
     * Página contacto
     */
    public function contact()
    {
        return $this->vuew('contact');
    }
}
