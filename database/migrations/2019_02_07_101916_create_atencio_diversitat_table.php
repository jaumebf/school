<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtencioDiversitatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atencio_diversitat', function (Blueprint $table) {
           $table->increments('id');
            $table->integer('alumne_id')->unsigned();
            $table->foreign('alumne_id')->references('id')->on('alumnes')->onDelete('cascade');
            $table->boolean('ed_especial');
            $table->boolean('acollida');
            $table->boolean('suport_linguistic');
            $table->boolean('sep');        
            $table->boolean('vetllador');        
            $table->boolean('at_individual');                
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
        Schema::dropIfExists('atencio_diversitat');
    }
}
