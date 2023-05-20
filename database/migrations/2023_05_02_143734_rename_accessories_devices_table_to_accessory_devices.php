<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAccessoriesDevicesTableToAccessoryDevices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accessories_devices', function (Blueprint $table) {
            Schema::rename('accessories_devices', 'accessory_devices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accessory_devices', function (Blueprint $table) {
            Schema::rename('accessory_devices', 'accessories_devices');
        });
    }
}
