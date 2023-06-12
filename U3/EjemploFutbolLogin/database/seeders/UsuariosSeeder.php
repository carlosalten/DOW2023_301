<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            ['email' => 'admin1@gmail.com','password' => Hash::make('1234'),'nombre'=>'Admin 1','rol_id'=>1],           
            ['email' => 'presidente1@gmail.com','password' => Hash::make('5678'),'nombre'=>'Jugador 1','rol_id'=>2],
            ['email' => 'presidente2@gmail.com','password' => Hash::make('8899'),'nombre'=>'Jugador 2','rol_id'=>2],
        ]);
    }
}
