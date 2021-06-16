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
    }
}
