<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FKSetup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plots', function (Blueprint $table) {
            $table->foreign('id_rasadnika')->references('id')->on('planters');
            $table->foreign('trenutno_posadjeno')->references('id')->on('plantings');
            $table->foreign('prethodno_posadjeno')->references('id')->on('plantings');
            $table->foreign('buduce_posadjeno')->references('id')->on('plantings');
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('id_kupca')->references('id')->on('buyers');
        });

        Schema::table('plantings', function (Blueprint $table) {
            $table->foreign('id_plota')->references('id')->on('plots');
            $table->foreign('id_transakcije')->references('id')->on('transactions');
            $table->foreign('id_biljke')->references('id')->on('plants');
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
