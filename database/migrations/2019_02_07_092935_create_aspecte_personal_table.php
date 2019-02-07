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
            $table->string('motivacio');
            $table->string('concentracio');
            $table->string('agenda');
            $table->string('relacio');
            $table->string('participacio');
            $table->string('relacio_profesor');          
            $table->string('emocions');          
            $table->string('normes');          
            $table->string('comportament');          
            $table->string('puntualitat');          
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
