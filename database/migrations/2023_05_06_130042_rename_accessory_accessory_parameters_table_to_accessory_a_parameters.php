<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAccessoryAccessoryParametersTableToAccessoryAParameters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accessory_accessory_parameters', function (Blueprint $table) {
            Schema::rename('accessory_accessory_parameters', 'accessory_a_parameters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accessory_a_parameters', function (Blueprint $table) {
            Schema::rename('accessory_a_parameters', 'accessory_accessory_parameters');
        });
    }
}
