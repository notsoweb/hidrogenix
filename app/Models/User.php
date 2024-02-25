<?php namespace App\Models;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use App\Http\Traits\ModelExtend;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * Usuarios del sistema
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use ModelExtend;

    /**
     * Atributos llenables masivamente
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'paternal',
        'maternal',
        'phone',
        'email',
        'password',
    ];

    /**
     * Los atributos que deben ocultarse para la serialización.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * Los atributos que deben transformarse.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Los atributos calculados que se añadirán a la matriz del modelo.
     *
     * @var array
     */
    protected $appends = [
        'full_name',
        'full_last_name',
        'profile_photo_url',
    ];

    /**
     * Un usuario a realizado muchas acciones
     */
    public function logs()
    {
        return $this->hasMany(HistoryLog::class);
    }

    /**
     * Retorna nombre completo
     */
    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->paternal} {$this->maternal}";
    }

     /**
     * Retornar apellido completo
     */
    public function getFullLastNameAttribute()
    {
        return "{$this->paternal} {$this->maternal}";
    }

    /**
     * Retornar nombre con primer apellido
     */
    public function getShortNameAttribute()
    {
        return "{$this->name} {$this->paternal}";
    }
}
