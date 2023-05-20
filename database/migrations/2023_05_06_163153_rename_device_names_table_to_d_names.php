<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameDeviceNamesTableToDNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('device_names', function (Blueprint $table) {
            Schema::rename('device_names', 'd_names');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('d_names', function (Blueprint $table) {
            Schema::rename('d_names', 'device_names');
        });
    }
}
