<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EquiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipos')->insert([
            ['nombre' => 'Curicó Unido','entrenador' => 'Damián Muñoz','created_at'=>Carbon::now()],           
            ['nombre' => 'Universidad Católica','entrenador' => 'Cristian Paolucci','created_at'=>Carbon::now()],
            ['nombre' => 'Cobresal','entrenador' => 'Gustavo Huerta','created_at'=>Carbon::now()],           
            ['nombre' => 'Audax Italiano','entrenador' => 'Ronald Fuentes','created_at'=>Carbon::now()],
            ['nombre' => 'Unión Española','entrenador' => 'César Bravo','created_at'=>Carbon::now()],
            ['nombre' => 'Colo Colo','entrenador' => 'Gustavo Quinteros','created_at'=>Carbon::now()],
            ['nombre' => 'Universidad de Chile','entrenador' => 'Santiago Escobar','created_at'=>Carbon::now()],
            ['nombre' => 'Ñublense','entrenador' => 'Jaime García','created_at'=>Carbon::now()],
        ]);
    }
}
