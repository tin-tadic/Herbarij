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
            // $table->foreign('id_plota')->references('id')->on('plots');

            $table->unsignedBigInteger('id_transakcije');
            // $table->foreign('id_transakcije')->references('id')->on('transactions');

            $table->unsignedBigInteger('id_biljke');
            // $table->foreign('id_biljke')->references('id')->on('plants');

            $table->integer('broj_biljaka');
            $table->date('datum_sadnje');
            $table->date('datum_uklanjanja');
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
