<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignatura', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ambit_id')->unsigned();
            $table->foreign('ambit_id')->references('id')->on('ambit')->onDelete('cascade');
            $table->integer('actitud_1');
            $table->integer('actitud_2');
            $table->integer('actitud_3');
            $table->integer('esforc_1');
            $table->integer('esforc_2');
            $table->integer('esforc_3');
            $table->integer('treball_1');
            $table->integer('treball_2');
            $table->integer('treball_3');   
            $table->integer('deures_1');
            $table->integer('deures_2');
            $table->integer('deures_3');   
            $table->integer('qualificacio_1');
            $table->integer('qualificacio_2');
            $table->integer('qualificacio_3');
            $table->text('observacions');
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
        Schema::dropIfExists('assignatura');
    }
}
