<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAdditionalParametersDeviceNameIdColumnInParametersValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parameters_values', function (Blueprint $table) {
            $table->renameColumn('additional_parameters_device_name_id', 'parameters_device_name_id');
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
            $table->renameColumn('parameters_device_name_id', 'additional_parameters_device_name_id');
        });
    }
}
