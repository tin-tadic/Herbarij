<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plants')->insert([
            'naziv' => 'kavada',
            'narodna_imena' => 'kavadar radar',
            'tip_tla'=> 'jureslav',
            'jestivost_ljudi' => 1,
            'jestivost_zivotinje' => 1,
            'ljekovitost' => 1,
            'gnjojivo' => 1,
            'otrovno' => 1,
            'gorivo' => 1,
            'sirovina' => 1,
            'vrijeme_sadnje' => Carbon::now()->format('Y-m-d'),
            'vrijeme_zetve' => Carbon::now()->format('Y-m-d'),
            'vrijeme_orezivanja' => Carbon::now()->format('Y-m-d'),
            'komentar' => 'subscribe',
            'trenutna_cijena' => 666,
        ]);

        //make them unique
        DB::table('plants')->insert([
            'naziv' => 'naziv1',
            'narodna_imena' => 'narodno ime 1',
            'tip_tla'=> 'tip1',
            'jestivost_ljudi' => 0,
            'jestivost_zivotinje' => 1,
            'ljekovitost' => 1,
            'gnjojivo' => 0,
            'otrovno' => 1,
            'gorivo' => 1,
            'sirovina' => 1,
            'vrijeme_sadnje' => Carbon::now()->format('Y-m-d'),
            'vrijeme_zetve' => Carbon::now()->format('Y-m-d'),
            'vrijeme_orezivanja' => Carbon::now()->format('Y-m-d'),
            'komentar' => 'subscribe',
            'trenutna_cijena' => 100,
        ]);

        DB::table('plants')->insert([
            'naziv' => 'naziv2',
            'narodna_imena' => 'narodno ime 2',
            'tip_tla'=> 'tip2',
            'jestivost_ljudi' => 0,
            'jestivost_zivotinje' => 0,
            'ljekovitost' => 0,
            'gnjojivo' => 1,
            'otrovno' => 1,
            'gorivo' => 1,
            'sirovina' => 1,
            'vrijeme_sadnje' => Carbon::now()->format('Y-m-d'),
            'vrijeme_zetve' => Carbon::now()->format('Y-m-d'),
            'vrijeme_orezivanja' => Carbon::now()->format('Y-m-d'),
            'komentar' => 'subscribe',
            'trenutna_cijena' => 200,
        ]);
    }
}
