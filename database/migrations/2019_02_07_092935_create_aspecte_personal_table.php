<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAspectePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspectes_personals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alumne_id')->unsigned();
            $table->foreign('alumne_id')->references('id')->on('alumnes')->onDelete('cascade');
            $table->integer('motivacio');
            $table->integer('concentracio');
            $table->integer('agenda');
            $table->integer('relacio');
            $table->integer('participacio');
            $table->integer('relacio_profesor');          
            $table->integer('emocions');          
            $table->integer('normes');          
            $table->integer('comportament');          
            $table->integer('puntualitat');          
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
        Schema::dropIfExists('aspecte_personal');
    }
}
