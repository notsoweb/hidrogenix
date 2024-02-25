<?php namespace App\Observers;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use App\Http\Traits\ReportAction;
use App\Models\Role;

/**
 * Observador del modelo Role
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class RoleObserver
{
    use ReportAction;

    /**
     * Objeto del evento
     */
    protected $event = 'roles';

    /**
     * Handle the Role "created" event.
     *
     * @param  \App\Models\Role  $role
     */
    public function created(Role $role) : void
    {
        $this->reportCreate($this->event, $role->fillableToArray(), __("{$this->event}.created", [
            'role' => $role->name
        ]));
    }

    /**
     * Handle the Role "updated" event.
     *
     * @param  \App\Models\Role  $role
     */
    public function updated(Role $role) : void
    {
        $this->reportUpdate($this->event, $role->getContrastChanges(), __("{$this->event}.updated", [
            'role' => $role->name
        ]));
    }

    /**
     * Handle the Role "deleted" event.
     *
     * @param  \App\Models\Role  $role
     */
    public function deleted(Role $role) : void
    {
        $this->reportDestroy($this->event, $role->fillableToArray(), __("{$this->event}.deleted", [
            'role' => $role->name
        ]));
    }

    /**
     * Handle the Role "restored" event.
     *
     * @param  \App\Models\Role  $role
     */
    public function restored(Role $role) : void
    {
        $this->reportUpdate($this->event, $role->fillableToArray(), __("{$this->event}.restored", [
            'role' => $role->name
        ]));
    }

    /**
     * Handle the Role "force deleted" event.
     *
     * @param  \App\Models\Role  $role
     */ 
    public function forceDeleted(Role $role) : void
    {
        $this->reportDestroy($this->event, $role->fillableToArray(), __("{$this->event}.forceDeleted", [
            'role' => $role->name
        ]));
    }
}
