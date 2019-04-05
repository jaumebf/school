<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumneAssignaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumne_assignatura', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('alumne_id');
            $table->unsignedInteger('assignatura_id');
            $table->integer('actitud_1')->default(0);
            $table->integer('actitud_2')->default(0);
            $table->integer('actitud_3')->default(0);
            $table->integer('esforc_1')->default(0);
            $table->integer('esforc_2')->default(0);
            $table->integer('esforc_3')->default(0);
            $table->integer('treball_1')->default(0);
            $table->integer('treball_2')->default(0);
            $table->integer('treball_3')->default(0);   
            $table->integer('deures_1')->default(0);
            $table->integer('deures_2')->default(0);
            $table->integer('deures_3')->default(0);   
            $table->integer('adaptats')->default(0);   
            $table->integer('qualificacio_1')->default(0);
            $table->integer('qualificacio_2')->default(0);
            $table->integer('qualificacio_3')->default(0);
            $table->string('observacions')->default('');
            $table->integer('comentari_1')->default(0);
            $table->integer('comentari_2')->default(0);
            $table->integer('comentari_3')->default(0);
            $table->integer('comentari_4')->default(0);            
            $table->foreign('alumne_id')->references('id')->on('alumnes')->onDelete('cascade');
            $table->foreign('assignatura_id')->references('id')->on('assignatura')->onDelete('cascade');
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
        Schema::dropIfExists('alumne_assignatura');
    }
}
