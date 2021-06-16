<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Plantings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_plota');
            $table->unsignedBigInteger('id_transakcije');
            $table->unsignedBigInteger('id_biljke');

            $table->integer('broj_biljaka');
            $table->date('datum_sadnje');
            $table->date('datum_uklanjanja');

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
