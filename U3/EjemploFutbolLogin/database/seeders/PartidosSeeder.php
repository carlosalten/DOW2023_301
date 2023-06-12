<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PartidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //inserta 8 partidos con fecha al azar dentro de los últimos 6 meses, todos con estado finalizado (2)
        for($i=1;$i<=8;$i++){
            DB::table('partidos')->insert(['fecha' => Carbon::today()->subDays(rand(1,183)),'estado' => 2]);
        }
    }
}
