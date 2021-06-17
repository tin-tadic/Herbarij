<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;


class BuyerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buyers')->insert([
            'ime' => 'prvi',
            'adresa' => 'adresa1',
            'tip' => 'kupac1',

        ]);

        DB::table('buyers')->insert([
            'ime' => 'drugi',
            'adresa' => 'adresa2',
            'tip' => 'kupac2',

        ]);

        DB::table('buyers')->insert([
            'ime' => 'treci',
            'adresa' => 'adresa3',
            'tip' => 'kupac3',

        ]);
    
    }
}
