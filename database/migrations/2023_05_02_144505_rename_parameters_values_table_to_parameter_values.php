<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameParametersValuesTableToParameterValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parameters_values', function (Blueprint $table) {
            Schema::rename('parameters_values', 'parameter_values');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parameter_values', function (Blueprint $table) {
            Schema::rename('parameter_values', 'parameters_values');
        });
    }
}
