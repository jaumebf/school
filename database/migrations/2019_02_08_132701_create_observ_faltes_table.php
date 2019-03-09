<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservFaltesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observ_faltes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alumne_id')->unsigned();
            $table->foreign('alumne_id')->references('id')->on('alumnes')->onDelete('cascade');
            $table->text('faltes');
            $table->longText('observacions');
            $table->string('data');
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
        Schema::dropIfExists('observ_faltes');
    }
}