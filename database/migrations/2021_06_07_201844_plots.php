<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Plots extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rasadnika');
            $table->string('naziv_plota')->nullable();
            $table->string('vrsta_plota')->nullable();

            $table->unsignedBigInteger('trenutno_posadjeno')->nullable();
            $table->unsignedBigInteger('prethodno_posadjeno')->nullable();
            $table->unsignedBigInteger('buduce_posadjeno')->nullable();

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
