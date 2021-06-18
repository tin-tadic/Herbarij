<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;
class PlantingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plantings')->insert([

            'id_plota' => 1,
            'id_transakcije' => 1,
            'id_biljke' => 1,
            'broj_biljaka'=> 22,
            'datum_sadnje' => Carbon::now()->format('Y-m-d'),
            'datum_uklanjanja' => Carbon::now()->format('Y-m-d'),
        ]);
    }
}
