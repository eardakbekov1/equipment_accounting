<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAccessoryDevicesTableToAccessoryDevice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accessory_devices', function (Blueprint $table) {
            Schema::rename('accessory_devices', 'accessory_device');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accessory_device', function (Blueprint $table) {
            Schema::rename('accessory_device', 'accessory_devices');
        });
    }
}
