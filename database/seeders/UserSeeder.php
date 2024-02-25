<?php namespace Database\Seeders;
/**
 * @copyright Copyright (c) 2023 Notsoweb (https://notsoweb.com) - All rights reserved.
 */

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Notsoweb\Core\Support\Seeder\UserSecureSupport;

/**
 * Siembra usuarios de forma segura
 * 
 * Siembra usuarios sin la necesidad de escribir una contraseña que quede registrada en el código.
 * El usuario será generado con una contraseña que puede ser consultado en el log. Esto permite
 * evitar el escribir las contraseñas en código. Esto permite que los usuarios de prueba sean seguros
 * y de proyecto en proyecto no sea una brecha de seguridad tener contraseñas dentro del código en caso
 * de que este pueda llegar a ser vulnerado.
 * 
 * @author Moisés de Jesús Cortés Castellanos <ing.moisesdejesuscortesc@notsoweb.com>
 * 
 * @version 1.0.0
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::withoutEvents(function () {
            // Usuario desarrollador
            [
                $developerEmail,
                $developerPass
            ] =  UserSecureSupport::new('developer@notsoweb.com');
    
            User::create([
                'name' => 'Developer',
                'paternal' => 'Notsoweb',
                'email' => $developerEmail,
                'phone' => '5631809090',
                'password' => $developerPass,
            ])->assignRole('developer');
            
            // Usuario administrador
            [
                $adminEmail,
                $adminPass
            ] = UserSecureSupport::new('admin@notsoweb.com');
    
            User::create([
                'name' => 'Administrador',
                'paternal' => 'Notsoweb',
                'email' => $adminEmail,
                'password' => $adminPass
            ])->assignRole('admin');
    
            // Usuario de prueba
            User::create([
                'name' => 'Demo',
                'paternal' => 'Notsoweb',
                'email' => 'demo@notsoweb.com',
                'password' => Hash::make('Demo')
            ]);
        });
    }
}
