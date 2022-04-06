<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Experiencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencia', function (Blueprint $table) {
            $table->id('id')->unique()->autoIncrement();
            $table->foreignId('id_joc')->references('id')->on('joc');
            $table->foreignId('id_reserva')->references('id')->on('reserva');
            $table->foreignId('id_empleat')->references('id')->on('user');
            $table->boolean('winner');

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
