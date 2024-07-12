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
        return $this->vuew('about');
    }

    /**
     * Acerca de nosotros
     */
    public function hidrogenix()
    {
        return $this->vuew('hidrogenix');
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
    public function faqs()
    {
        return $this->vuew('faqs');
    }

    /**
     * Acerca de nosotros
     */
    public function research()
    {
        return $this->vuew('research');
    }

    /**
     * Acerca de nosotros
     */
    public function news()
    {
        return $this->vuew('news');
    }

    /**
     * Página contacto
     */
    public function contact()
    {
        return $this->vuew('contact');
    }

    /**
     * Página contacto
     */
    public function testimonial()
    {
        return $this->vuew('testimonial');
    }
}
