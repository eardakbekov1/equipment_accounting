<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameParametersDeviceNameIdColumnInParameterValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parameter_values', function (Blueprint $table) {
            $table->renameColumn('parameters_device_name_id', 'parameter_device_name_id');
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
            $table->renameColumn('parameter_device_name_id', 'parameters_device_name_id');
        });
    }
}
