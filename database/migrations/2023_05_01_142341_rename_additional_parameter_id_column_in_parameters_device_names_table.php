<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAdditionalParameterIdColumnInParametersDeviceNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parameters_device_names', function (Blueprint $table) {
            $table->renameColumn('additional_parameter_id', 'parameter_id');
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
            $table->renameColumn('parameter_id', 'additional_parameter_id');
        });
    }
}
