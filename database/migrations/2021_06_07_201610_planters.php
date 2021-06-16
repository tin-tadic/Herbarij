<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Planters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planters', function (Blueprint $table) {
            $table->id();
            $table->string('naziv_rasadnika')->nullable();
            $table->string('vrsta')->nullable();
            $table->string('lokacija')->nullable();
            $table->float('povrsina')->nullable();
            $table->string('komentar')->nullable();
            $table->string('vrsta_tla')->nullable();
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
