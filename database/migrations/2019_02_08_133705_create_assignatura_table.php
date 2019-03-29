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
            $table->string('nom');
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
            $table->integer('qualificacio_1')->default(0);
            $table->integer('qualificacio_2')->default(0);
            $table->integer('qualificacio_3')->default(0);
            $table->text('observacions')->default(' ');
            $table->timestamps();
        });
        
        DB::table('assignatura')->insert(
            array('nom' => "Llengua catalana"),
            array('nom' => "Llengua castellana"),
            array('nom' => "Llengua anglesa"),
            array('nom' => "Matemàtiques"),
            array('nom' => "Coneixement del medi natural"),
            array('nom' => "Coneixement del medi social"),
            array('nom' => "Visual i plàstica, música i dansa"),
            array('nom' => "Educació física"),
            array('nom' => "Religió catòlica"),
            array('nom' => "Educació valors socials i cívics")                
        );
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
