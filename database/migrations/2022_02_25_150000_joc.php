<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Joc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joc', function (Blueprint $table) {
            $table->id('id')->unique()->autoIncrement();
            $table->string("name");
            $table->float("price");
            $table->integer("max_players");
            $table->integer("min_players");
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
