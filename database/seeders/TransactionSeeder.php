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
            'datum'=> Carbon::now()->format('Y-m-d'),
            'stanje'=> "Naruceno",
            'cijena'=> 2.4,//
            'artikl' => 'Jabuka',//
            'kolicina' => 10,//
        ]);
        DB::table('transactions')->insert([
            'id_kupca'=> 1,
            'tip_transakcije' => '1',
            'datum'=> Carbon::now()->format('Y-m-d'),
            'stanje'=> "Gotovo",
            'cijena'=> 2.4,
            'artikl' => 'Jabuka',
            'kolicina' => 10,
        ]);
        DB::table('transactions')->insert([
            'id_kupca'=> 1,
            'tip_transakcije' => '1',
            'datum'=> Carbon::now()->format('Y-m-d'),
            'stanje'=> "Otkazano",
            'cijena'=> 2.4,
            'artikl' => 'Jabuka',
            'kolicina' => 10,
        ]);

        DB::table('transactions')->insert([
            'id_kupca'=> 2,
            'tip_transakcije' => '2',
            'datum'=> Carbon::now()->format('Y-m-d'),
            'stanje'=> "Naruceno",
            'cijena'=> 5.4,
            'artikl' => 'Jabuka',
            'kolicina' => 10,
        ]);
        DB::table('transactions')->insert([
            'id_kupca'=> 2,
            'tip_transakcije' => '2',
            'datum'=> Carbon::now()->format('Y-m-d'),
            'stanje'=> "Gotovo",
            'cijena'=> 5.4,
            'artikl' => 'Jabuka',
            'kolicina' => 10,
        ]);
        DB::table('transactions')->insert([
            'id_kupca'=> 2,
            'tip_transakcije' => '2',
            'datum'=> Carbon::now()->format('Y-m-d'),
            'stanje'=> "Otkazano",
            'cijena'=> 5.4,
            'artikl' => 'Jabuka',
            'kolicina' => 10,
        ]);

        DB::table('transactions')->insert([
            'id_kupca'=> 3,
            'tip_transakcije' => '3',
            'datum'=> Carbon::now()->format('Y-m-d'),
            'stanje'=> "Naruceno",
            'cijena'=> 4.4,
            'artikl' => 'Jabuka',
            'kolicina' => 10,
        ]);
        DB::table('transactions')->insert([
            'id_kupca'=> 3,
            'tip_transakcije' => '3',
            'datum'=> Carbon::now()->format('Y-m-d'),
            'stanje'=> "Gotovo",
            'cijena'=> 4.4,
            'artikl' => 'Jabuka',
            'kolicina' => 10,
        ]);
        DB::table('transactions')->insert([
            'id_kupca'=> 3,
            'tip_transakcije' => '3',
            'datum'=> Carbon::now()->format('Y-m-d'),
            'stanje'=> "Otkazano",
            'cijena'=> 4.4,
            'artikl' => 'Jabuka',
            'kolicina' => 10,
        ]);

    }
}
