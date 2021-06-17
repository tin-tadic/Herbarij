<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
                'id_kupca'=> 1,
                'tip_transakcije' => 'prva',
                'komentar'=> 'prvi',
                'datum'=> Carbon::now()->format('Y-m-d'),
                'stanje'=> 2,
                'cijena'=> 2.4,

        ]);

        DB::table('transactions')->insert([
            'id_kupca'=> 2,
            'tip_transakcije' => 'prva',
            'komentar'=> 'prvi',
            'datum'=> Carbon::now()->format('Y-m-d'),
            'stanje'=> 2,
            'cijena'=> 5.4,

    ]);

    DB::table('transactions')->insert([
        'id_kupca'=> 6,
        'tip_transakcije' => 'prva',
        'komentar'=> 'prvi',
        'datum'=> Carbon::now()->format('Y-m-d'),
        'stanje'=> 2,
        'cijena'=> 4.4,s

]);
    }
}
