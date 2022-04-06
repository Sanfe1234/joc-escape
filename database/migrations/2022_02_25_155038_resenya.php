<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Resenya extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resenya', function (Blueprint $table) {
            $table->id('id')->unique()->autoIncrement();
            $table->foreignId('id_experience')->references('id')->on('experiencia');
            $table->foreignId('id_user')->references('id')->on('user');
            $table->date('data_resenya');
            $table->integer('puntuacio');
            $table->text('text');
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
