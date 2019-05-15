<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Crypt;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jordi Valls',
            'email' => 'jordivalls@hotmail.com',
            'password' =>Hash::make('password'),
            'rol' => 'admin',
            'remember_token' => str_random(10),
        ]);
        $contraseñaEncriptada = Crypt::encrypt('hola');
        User::create([
            'name' => 'Juan pepito',
            'email' => 'juan@hotmail.com',
            'password' => $contraseñaEncriptada,
            'rol' => 'admin',
            'remember_token' => str_random(10),
        ]);
    }
}
