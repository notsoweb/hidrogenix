<?php namespace App\Http\Controllers\Developer;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use App\Models\Role;
use Illuminate\Http\Request;
use Notsoweb\Core\Http\Controllers\VueController;
use Notsoweb\Core\Http\Traits\Controllers\WithPermission;

/**
 * Administra los roles del sistema
 * 
 * CRUD de los roles. Algunos roles están implícitos en el código para dar permisos. Por lo que
 * es un controlador sensible.
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class RoleController extends VueController
{
    use WithPermission;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->withDefaultPermissions('roles');
        $this->vueRoot('developer.roles');
    }

    /**
     * Listar roles
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = request()->get('q');

        return $this->vuew('index', [
            'roles' => Role::orderBy('name', 'ASC')
                ->where('name', 'LIKE', "%{$q}%")
                ->select([
                    'id', 
                    'name',
                    'description'
                ])
                ->paginate(config('app.pagination'))
        ]);
    }

    /**
     * Vista nuevo rol
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->vuew('create');
    }

    /**
     * Almacenar role
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string']
        ]);

        Role::create($data);

        return $this->index();
    }

    /**
     * Actualizar role
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param Role $role Modelo del Role
     */
    public function update(Request $request, $role) : void
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string']
        ]);

        $model = Role::find($role);
        $model->update($data);
    }

    /**
     * Eliminar rol
     * 
     * Se debe de tener mucho cuidado en la eliminación de los roles ya que algunos de ellos
     * están ligados a nivel código en el sistema, lo que podría limitar a los usuarios o
     * bloquear el sistema.
     *
     * @param Role $role Modelo del Role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role) : void
    {
        $role->delete();
    }
}
