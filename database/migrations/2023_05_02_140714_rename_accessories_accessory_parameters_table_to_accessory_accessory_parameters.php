<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAccessoriesAccessoryParametersTableToAccessoryAccessoryParameters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accessories_accessory_parameters', function (Blueprint $table) {
            Schema::rename('accessories_accessory_parameters', 'accessory_accessory_parameters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accessory_accessory_parameters', function (Blueprint $table) {
            Schema::rename('accessory_accessory_parameters', 'accessories_accessory_parameters');
        });
    }
}
