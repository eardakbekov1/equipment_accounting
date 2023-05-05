<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAccessoryParametersValuesTableToAccessoryParameterValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accessory_parameters_values', function (Blueprint $table) {
            Schema::rename('accessory_parameters_values', 'accessory_parameter_values');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accessory_parameter_values', function (Blueprint $table) {
            Schema::rename('accessory_parameter_values', 'accessory_parameters_values');
        });
    }
}
