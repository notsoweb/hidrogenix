<?php namespace App\Models;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Permite guardar el log de acciones de los usuarios
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class HistoryLog extends Model
{
    use HasFactory;

    /**
     * Atributos llenables masivamente
     */
    protected $fillable = [
        'action',
        'qty',
        'message',
        'data',
        'user_id'
    ];

    /**
     * Los atributos que deben transformarse.
     */
    protected $casts = [
        'data' => 'json'
    ];

    /**
     * Un log pertenece a un usuario
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
