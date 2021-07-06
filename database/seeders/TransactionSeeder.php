<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

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
            'tip_transakcije' => '1',
            'komentar'=> 'prvi',//
            'datum'=> Carbon::now()->format('Y-m-d'),
            'stanje'=> 0,
            'cijena'=> 2.4,//
            'artikl' => 'Jabuka',//
            'kolicina' => 10,//
        ]);
        DB::table('transactions')->insert([
            'id_kupca'=> 1,
            'tip_transakcije' => '1',
            'komentar'=> 'prvi',
            'datum'=> Carbon::now()->format('Y-m-d'),
            'stanje'=> 1,
            'cijena'=> 2.4,
            'artikl' => 'Jabuka',
            'kolicina' => 10,
        ]);
        DB::table('transactions')->insert([
            'id_kupca'=> 1,
            'tip_transakcije' => '1',
            'komentar'=> 'prvi',
            'datum'=> Carbon::now()->format('Y-m-d'),
            'stanje'=> 2,
            'cijena'=> 2.4,
            'artikl' => 'Jabuka',
            'kolicina' => 10,
        ]);

        DB::table('transactions')->insert([
            'id_kupca'=> 2,
            'tip_transakcije' => '2',
            'komentar'=> 'prvi',
            'datum'=> Carbon::now()->format('Y-m-d'),
            'stanje'=> 0,
            'cijena'=> 5.4,
            'artikl' => 'Jabuka',
            'kolicina' => 10,
        ]);
        DB::table('transactions')->insert([
            'id_kupca'=> 2,
            'tip_transakcije' => '2',
            'komentar'=> 'prvi',
            'datum'=> Carbon::now()->format('Y-m-d'),
            'stanje'=> 1,
            'cijena'=> 5.4,
            'artikl' => 'Jabuka',
            'kolicina' => 10,
        ]);
        DB::table('transactions')->insert([
            'id_kupca'=> 2,
            'tip_transakcije' => '2',
            'komentar'=> 'prvi',
            'datum'=> Carbon::now()->format('Y-m-d'),
            'stanje'=> 2,
            'cijena'=> 5.4,
            'artikl' => 'Jabuka',
            'kolicina' => 10,
        ]);

        DB::table('transactions')->insert([
            'id_kupca'=> 3,
            'tip_transakcije' => '3',
            'komentar'=> 'prvi',
            'datum'=> Carbon::now()->format('Y-m-d'),
            'stanje'=> 0,
            'cijena'=> 4.4,
            'artikl' => 'Jabuka',
            'kolicina' => 10,
        ]);
        DB::table('transactions')->insert([
            'id_kupca'=> 3,
            'tip_transakcije' => '3',
            'komentar'=> 'prvi',
            'datum'=> Carbon::now()->format('Y-m-d'),
            'stanje'=> 1,
            'cijena'=> 4.4,
            'artikl' => 'Jabuka',
            'kolicina' => 10,
        ]);
        DB::table('transactions')->insert([
            'id_kupca'=> 3,
            'tip_transakcije' => '3',
            'komentar'=> 'prvi',
            'datum'=> Carbon::now()->format('Y-m-d'),
            'stanje'=> 2,
            'cijena'=> 4.4,
            'artikl' => 'Jabuka',
            'kolicina' => 10,
        ]);

    }
}
