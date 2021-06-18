<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  

        DB::table('plots')->insert([
            'id_rasadnika' => 2 ,
            'naziv_plota'=> 'plot1',
            'vrsta_plota' => 'vrsta 1',
            'trenutno_posadjeno' => NULL,
            'prethodno_posadjeno' => NULL,
            'buduce_posadjeno'=> NULL
        ]);

        DB::table('plots')->insert([
            'id_rasadnika' => 2,
            'naziv_plota'=> 'plot2',
            'vrsta_plota' => 'vrsta2',
            'trenutno_posadjeno' => NULL,
            'prethodno_posadjeno' => NULL,
            'buduce_posadjeno'=> NULL
        ]);

        DB::table('plots')->insert([
            'id_rasadnika' => 3,
            'naziv_plota'=> 'plot3',
            'vrsta_plota' => 'vrsta3',
            'trenutno_posadjeno' => NULL,
            'prethodno_posadjeno' => NULL,
            'buduce_posadjeno'=> NULL
        ]);

    }
}
