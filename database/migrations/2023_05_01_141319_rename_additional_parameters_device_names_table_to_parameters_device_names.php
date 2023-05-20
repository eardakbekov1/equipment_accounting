<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAdditionalParametersDeviceNamesTableToParametersDeviceNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('additional_parameters_device_names', function (Blueprint $table) {
            Schema::rename('additional_parameters_device_names', 'parameters_device_names');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parameters_device_names', function (Blueprint $table) {
            Schema::rename('parameters_device_names', 'additional_parameters_device_names');
        });
    }
}
