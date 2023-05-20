<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameParameterDeviceNamesTableToDNameDParameters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parameter_device_names', function (Blueprint $table) {
            Schema::rename('parameter_device_names', 'd_name_d_parameters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('d_name_d_parameters', function (Blueprint $table) {
            Schema::rename('d_name_d_parameters', 'parameter_device_names');
        });
    }
}
