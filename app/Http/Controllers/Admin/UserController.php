<?php namespace App\Http\Controllers\Admin;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Http\Traits\UseFetch;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Notsoweb\Core\Http\Controllers\VueController;
use Notsoweb\Core\Http\Traits\Controllers\WithPermission;
use Spatie\Permission\Models\Role;

/**
 * Controla los usuarios del sistema
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class UserController extends VueController
{
    use UseFetch,
        WithPermission;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->vueRoot('admin.user');
        $this->withDefaultPermissions('users');
    }

    /**
     * Listar usuarios
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = request()->get('q');

        return $this->vuew('index', [
            'users' => User::whereNotIn('id', [1,2])
                ->where(fn($query) => $query
                    ->where('name', 'LIKE', "%{$q}%")
                    ->orWhere('email', 'LIKE', "%{$q}%"))
                ->select([
                    'id',
                    'name',
                    'paternal',
                    'maternal',
                    'email',
                    'phone'
                ])
                ->paginate(config('app.pagination')),
            ]);
    }

    /**
     * Mostrar formulario crear usuario
     */
    public function create()
    {
        return $this->vuew('create');
    }

    /**
     * Almacenar usuario
     */
    public function store(StoreUser $request)
    {
        $data = $request->all();
        // Cifro la contraseña recibida
        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return $this->index();
    }

    /**
     * Vista configurar usuario
     * 
     * @param User $user Modelo del usuario
     */
    public function settings(User $user)
    {
        return $this->vuew('settings', [
            'user' => $user,
            'userRoles' => $user->roles,
            'roles'=> Role::orderBy('name', 'ASC')
                ->get(),
        ]);
    }

    /**
     * Actualizar usuario
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param User $user Modelo del usuario
     */
    public function update(UpdateUser $request, $user) : void
    {
        $data = $request->all();

        $model = User::find($user);
        $model->update($data);
    }

    /**
     * Actualizar contraseña usuario
     * 
     * @param Request $request
     */
    public function updatePassword(Request $request) : void
    {
        $data = $this->validate($request, [
            'password' => ['required', 'string', 'min:8'],
            'user_id' => ['required'],
        ]);
        
        $user = User::find($data['user_id']);   
        $user->update([
            'password' => Hash::make($data['password'])
        ]);
    }

    /**
     * Sincronizar roles usuario
     * 
     * @param Request $request
     */
    public function syncRoles(Request $request) : void
    {
        $data = $this->validate($request, [
            'roles' => ['nullable'],
            'user_id' => ['required']
        ]);

        $roles = [];

        foreach ($data['roles'] as $role) {
            $roles[] = $role['id'];
        }

        $user = User::find($data['user_id']);
        $user->syncRoles($roles);
    }

    /**
     * Obtener notificaciones
     * 
     * Trae las ultimas 7 notificaciones.
     * 
     * @return JsonResponse
     */
    public function getNotifications() : JsonResponse
    {
        try {
            $notifications = auth()
                ->user()
                ->notifications()
                ->limit(7)
                ->latest()
                ->get();

            return $this->successFetch([
                'notifications' => $notifications
            ]);
        } catch (\Throwable $th) {
            $this->reportError($th, __METHOD__);
            return $this->errorFetch(__('The user does not have notifications'));
        }
    }

    /**
     * Eliminar usuario
     * 
     * @param integer $user ID del usuario
     */
    public function destroy($user) : void
    {
        try {
            $user = User::find($user);
            $user->delete();

            
        } catch (\Throwable $th) {
            Log::channel('users')
                ->error($th->getMessage());
        }
    }

    /**
     * Log de errores
     * 
     * @param object $th Contiene todos los detalles del error
     * @param string $method Función del controlador sobre la que ocurrió el error
     */
    private function reportError($th, $method) : void
    {
        Log::channel('users')->error("Method: $method");
        Log::channel('users')->error($th->getMessage());
    }
}
