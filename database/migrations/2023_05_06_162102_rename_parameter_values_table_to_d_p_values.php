<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameParameterValuesTableToDPValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parameter_values', function (Blueprint $table) {
            Schema::rename('parameter_values', 'd_p_values');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('d_p_values', function (Blueprint $table) {
            Schema::rename('d_p_values', 'parameter_values');
        });
    }
}
