<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropSomeColumnsFromDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->dropColumn('system_name');
            $table->dropColumn('category_id');
            $table->dropColumn('imei');
            $table->dropColumn('imei2');
            $table->dropColumn('phone_number');
            $table->dropColumn('ip_address');
            $table->dropColumn('mac_address');
            $table->dropColumn('ssid');
            $table->dropColumn('wifi_key');
            $table->dropColumn('username');
            $table->dropColumn('password');
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
            //
        });
    }
}
