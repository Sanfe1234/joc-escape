<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reserva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva', function (Blueprint $table) {
            $table->id('id')->unique()->autoIncrement();
            $table->foreignId('id_user')->references('id')->on('user');
            $table->foreignId('id_sala')->references('id')->on('sala');
            $table->dateTime('data_reserva');
            $table->boolean('validat');
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
