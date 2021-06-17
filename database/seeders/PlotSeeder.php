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
    'trenutno_posadjeno' => 1,
    'prethodno_posadjeno' => 2,
    'buduce_posadjeno'=>3
    ]);

    DB::table('plots')->insert([
        'id_rasadnika' => 2,
        'naziv_plota'=> 'plot2',
        'vrsta_plota' => 'vrsta2',
        'trenutno_posadjeno' => 5,
        'prethodno_posadjeno' => 6,
        'buduce_posadjeno'=> 7

        ]);

    DB::table('plots')->insert([
    'id_rasadnika' => 3,
    'naziv_plota'=> 'plot3',
    'vrsta_plota' => 'vrsta3',
    'trenutno_posadjeno' => 9,
    'prethodno_posadjeno' => 11,
    'buduce_posadjeno'=> 12


            ]);


    }
}
