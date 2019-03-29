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
