<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaIndividualitzatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pla_individualitzat', function (Blueprint $table) {
           $table->increments('id');
            $table->integer('alumne_id')->unsigned();
            $table->foreign('alumne_id')->references('id')->on('alumnes')->onDelete('cascade');
            $table->integer('llengua');
            $table->integer('llengua_castellana');
            $table->integer('llengua_inglesa');
            $table->integer('matematiques');
            $table->integer('cm_natural');
            $table->integer('cm_social');
            $table->integer('ed_artistica');
            $table->integer('ed_fisica');
            $table->integer('religio');
            $table->integer('valors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pla_individualitzat');
    }
}
