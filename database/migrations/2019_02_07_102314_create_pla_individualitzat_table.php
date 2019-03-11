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
            $table->boolean('llengua');
            $table->boolean('llengua_castellana');
            $table->boolean('llengua_inglesa');
            $table->boolean('matematiques');
            $table->boolean('cm_natural');
            $table->boolean('cm_social');
            $table->boolean('ed_artistica');
            $table->boolean('ed_fisica');
            $table->boolean('religio');
            $table->boolean('valors');
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
        Schema::dropIfExists('pla_individualitzat');
    }
}
