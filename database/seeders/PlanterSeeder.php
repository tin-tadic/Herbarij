<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class PlanterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('planters')->insert([
            'naziv_rasadnika' => 'rasadnik1',
            'vrsta' => 'prva vrsta',
            'lokacija' => 'lokacija1',
            'povrsina' => 100,
            'komentar' => 'prvi',
            'vrsta_tla' => 'vrsta'


        ]);


        DB::table('planters')->insert([
            'naziv_rasadnika' => 'rasadnik2',
            'vrsta' => 'druga vrsta',
            'lokacija' => 'lokacija2',
            'povrsina' => 200,
            'komentar' => 'drugi',
            'vrsta_tla' => 'vrsta2'


        ]);

        DB::table('planters')->insert([
            'naziv_rasadnika' => 'rasadnik3',
            'vrsta' => 'treca vrsta',
            'lokacija' => 'lokacija3',
            'povrsina' => 300,
            'komentar' => 'treci',
            'vrsta_tla' => 'vrsta3'


        ]);
    }
}
