<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name     = 'Usuario';
        $user->username = 'laradmin';
        $user->genero   = 'M';
        $user->lastname = 'Gonzalez';
        $user->email    = 'ugonzalez@mail.com';
        $user->password = 'admin';
        $user->status   = 1; // (1) active (0)disabled
        $user->save();

        $user->assignRole('Super Administrador');



        $user = new User;
        $user->name     = 'Usuario';
        $user->username = 'dmeneses';
        $user->genero   = 'M';
        $user->lastname = 'Meneses';
        $user->email    = 'umeneses@mail.com';
        $user->password = 'dmeneses2022***';
        $user->status   = 1; // (1) active (0)disabled
        $user->save();

        $user->assignRole('Administrador');


        $user = new User;
        $user->name     = 'Usuario';
        $user->lastname = 'Rojas';
        $user->username = 'urojas';
        $user->genero   = 'F';
        $user->email    = 'drojas@mail.com';
        $user->password = 'drojas2022**';
        $user->status   = 1; // (1) active (0)disabled
        $user->save();

        $user->assignRole('Administrador');


        $user = new User;
        $user->name     = 'Usuario';
        $user->lastname = 'Rojas';
        $user->username = 'urojas';
        $user->genero   = 'F';
        $user->email    = 'zrojas@mail.com';
        $user->password = 'zrojas2022***';
        $user->status   = 1; // (1) active (0)disabled
        $user->save();

        $user->assignRole('Supervisor');


        $user = new User;
        $user->name     = 'Usuario';
        $user->lastname = 'Hidalgo';
        $user->username = 'uhidalgo';
        $user->genero   = 'M';
        $user->email    = 'ihidalgo@mail.com';
        $user->password = 'ihidalgo2022**';
        $user->status   = 1; // (1) active (0)disabled
        $user->save();

        $user->assignRole('Vendedor');
		
		
		$user = new User;
        $user->name     = 'Usuario';
        $user->lastname = 'Ramos';
        $user->username = 'uramos';
        $user->genero   = 'F';
        $user->email    = 'eramos@mail.com';
        $user->password = 'eramos2022**';
        $user->status   = 1; // (1) active (0)disabled
        $user->save();

        $user->assignRole('Vendedor');


        $user = new User;
        $user->name     = 'Usuario';
        $user->lastname = 'Zapata';
        $user->username = 'uzapata';
        $user->genero   = 'M';
        $user->email    = 'rzapata@mail.com';
        $user->password = 'rzapata2022**';
        $user->status   = 1; // (1) active (0)disabled
        $user->save();

        $user->assignRole('Encargado');

    }
}
