<?php

use App\Http\Webhooks\UpdateAppHook;
use Illuminate\Support\Facades\Route;

/**
 * Lista de webhooks
 */
Route::post('/update-app', UpdateAppHook::class);
