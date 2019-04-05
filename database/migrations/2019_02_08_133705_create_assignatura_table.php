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
            $table->timestamps();
        });
        
        DB::table('assignatura')->insert ( 
            array(
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
            )
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
