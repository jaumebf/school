<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnRolToObservFaltesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('observ_faltes', function (Blueprint $table) {
            $table->integer('numfaltesJust')->after('faltes')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('observ_faltes', function (Blueprint $table) {
            $table->dropColumn('numfaltesJust');
        });
    }
}
