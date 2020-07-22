<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->truncate();

        DB::table('usuarios')->insert([
            'nombre' => 'juan',
            'apellido' => 'perez',
            'rut' => '12322234-2',
            'fecha_nacimiento' => '2000-01-01',
            'email' => 'juan@gmail.com',
            'password' => Hash::make('123456'),
            'foto'=>'uploads/JKviUKa6DGb1CTXw0EzzVojdBNNNzqMllOLA6hNW.jpeg'
        ]);
        DB::table('usuarios')->insert([
            'nombre' => 'carlos',
            'apellido' => 'perez',
            'rut' => '12322211-2',
            'fecha_nacimiento' => '2002-01-01',
            'email' => 'carlos@gmail.com',
            'password' => Hash::make('54321'),
            'foto'=>'uploads/ae665PW1wqrH2Q0X9odZHIKijZfpqo0K8JeCpVXO.jpeg'
        ]);
        DB::table('usuarios')->insert([
            'nombre' => 'matias',
            'apellido' => 'perez',
            'rut' => '11111111-2',
            'fecha_nacimiento' => '2000-01-01',
            'email' => 'matias@gmail.com',
            'password' => Hash::make('123456'),
            'foto'=>'uploads/UPlYq9IEsnZPIImsNTfPEhfVcR7A4D4erwaKUf79.jpeg'
        ]);
    }
}
