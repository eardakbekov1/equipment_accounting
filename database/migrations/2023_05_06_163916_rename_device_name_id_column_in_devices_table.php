<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameDeviceNameIdColumnInDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->renameColumn('device_name_id', 'd_name_id');
            $table->renameColumn('device_model_id', 'd_model_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->renameColumn('d_name_id', 'device_name_id');
            $table->renameColumn('d_model_id', 'device_model_id');
        });
    }
}
