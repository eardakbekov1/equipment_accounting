<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAdditionalParametersValuesTableToParametersValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('additional_parameters_values', function (Blueprint $table) {
            Schema::rename('additional_parameters_values', 'parameters_values');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parameters_values', function (Blueprint $table) {
            Schema::rename('parameters_values', 'additional_parameters_values');
        });
    }
}
