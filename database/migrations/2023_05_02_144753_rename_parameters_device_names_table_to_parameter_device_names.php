<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameParametersDeviceNamesTableToParameterDeviceNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parameters_device_names', function (Blueprint $table) {
            Schema::rename('parameters_device_names', 'parameter_device_names');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parameter_device_names', function (Blueprint $table) {
            Schema::rename('parameter_device_names', 'parameters_device_names');
        });
    }
}
