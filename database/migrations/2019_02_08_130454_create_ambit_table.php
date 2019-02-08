<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alumne_id')->unsigned();
            $table->foreign('alumne_id')->references('id')->on('alumnes')->onDelete('cascade');
            $table->string('name');

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
        Schema::dropIfExists('ambit');
    }
}
