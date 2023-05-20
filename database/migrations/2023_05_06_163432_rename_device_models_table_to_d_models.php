<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameDeviceModelsTableToDModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('device_models', function (Blueprint $table) {
            Schema::rename('device_models', 'd_models');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('d_models', function (Blueprint $table) {
            Schema::rename('d_models', 'device_models');
        });
    }
}
