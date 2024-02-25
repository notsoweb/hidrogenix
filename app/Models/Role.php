<?php namespace App\Models;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use App\Http\Traits\ModelExtend;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as ModelsRole;

/**
 * Roles del sistema
 * 
 * Los roles y permisos son controlados por Spatie\Permission. Este modelo solo es una
 * interfaz para poder visualizar los roles del sistema, o crear nuevos para el desarrollo
 * de vistas.
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class Role extends ModelsRole
{
    use HasFactory,
        ModelExtend;

    /**
     * Atributos llenables masivamente
     */
    protected $fillable = [
        'name',
        'guard_name',
        'description'
    ];
}
