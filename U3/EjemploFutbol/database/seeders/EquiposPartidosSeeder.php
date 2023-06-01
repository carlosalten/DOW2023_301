<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EquiposPartidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipo_partido')->insert([
            ['equipo_id'=>1,'partido_id'=>1,'es_local'=>true,'goles'=>rand(0,5)],
            ['equipo_id'=>2,'partido_id'=>1,'es_local'=>false,'goles'=>rand(0,5)],
            ['equipo_id'=>3,'partido_id'=>2,'es_local'=>true,'goles'=>rand(0,5)],
            ['equipo_id'=>4,'partido_id'=>2,'es_local'=>false,'goles'=>rand(0,5)],
            ['equipo_id'=>5,'partido_id'=>3,'es_local'=>true,'goles'=>rand(0,5)],
            ['equipo_id'=>6,'partido_id'=>3,'es_local'=>false,'goles'=>rand(0,5)],
            ['equipo_id'=>7,'partido_id'=>4,'es_local'=>true,'goles'=>rand(0,5)],
            ['equipo_id'=>8,'partido_id'=>4,'es_local'=>false,'goles'=>rand(0,5)],
            ['equipo_id'=>1,'partido_id'=>5,'es_local'=>true,'goles'=>rand(0,5)],
            ['equipo_id'=>8,'partido_id'=>5,'es_local'=>false,'goles'=>rand(0,5)],
            ['equipo_id'=>2,'partido_id'=>6,'es_local'=>true,'goles'=>rand(0,5)],
            ['equipo_id'=>7,'partido_id'=>6,'es_local'=>false,'goles'=>rand(0,5)],
            ['equipo_id'=>3,'partido_id'=>7,'es_local'=>true,'goles'=>rand(0,5)],
            ['equipo_id'=>6,'partido_id'=>7,'es_local'=>false,'goles'=>rand(0,5)],
            ['equipo_id'=>4,'partido_id'=>8,'es_local'=>true,'goles'=>rand(0,5)],
            ['equipo_id'=>5,'partido_id'=>8,'es_local'=>false,'goles'=>rand(0,5)],
        ]);
    }
}
