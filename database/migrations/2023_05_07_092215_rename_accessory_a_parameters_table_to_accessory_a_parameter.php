<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAccessoryAParametersTableToAccessoryAParameter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accessory_a_parameters', function (Blueprint $table) {
            Schema::rename('accessory_a_parameters', 'accessory_a_parameter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accessory_a_parameter', function (Blueprint $table) {
            Schema::rename('accessory_a_parameter', 'accessory_a_parameters');
        });
    }
}
