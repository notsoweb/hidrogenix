<?php namespace App\Http\Webhooks;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

/**
 * Recibe los eventos de actualización de la aplicación
 * 
 * PRUEBA 5
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.1
 */
class UpdateAppHook extends Controller
{
    public function __invoke(Request $request)
    {
        $branch = config('app.repository.branch');
        $data = $request->all();

        Log::channel('hook:update-app')->info('update:', $data);
        Log::channel('app:update')->info("Init updating {$branch} ...");

        if($data['ref'] == "refs/heads/{$branch}") {
            if($data['before'] != $data['after']) {
                Artisan::call('app:update');

                foreach ($data['commits'] as $commit) {
                    Log::channel('app:update')->info($commit['message']);
                }
                Log::channel('app:update')->info('¡Updated!');
            } else {
                Log::channel('app:update')->info('No was updated');
            }
        } else {
            Log::channel('app:update')->info('Not is updatable');
        }

        Log::channel('app:update')->info('Exit updating');
    }
}