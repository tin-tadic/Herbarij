<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Plants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('naziv');
            $table->string('narodna_imena')->nullable();
            $table->string('tip_tla');

            $table->boolean('jestivost_ljudi');
            $table->boolean('jestivost_zivotinje');
            $table->boolean('ljekovitost');
            $table->boolean('gnjojivo');
            $table->boolean('otrovno');
            $table->boolean('gorivo');
            $table->boolean('sirovina');

            $table->date('vrijeme_sadnje')->nullable();
            $table->date('vrijeme_zetve')->nullable();
            $table->date('vrijeme_orezivanja')->nullable();
            
            $table->string('komentar')->nullable();
            $table->string('slika')->nullable();
            $table->string('opis')->nullable();
            $table->float('trenutna_cijena')->nullable();
            $table->string('kolicina_cijene')->nullable();

            $table->string('sorta')->nullable();
            $table->string('kategorija')->nullable();
            $table->string('naziv_dobavljaca')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
