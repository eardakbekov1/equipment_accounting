<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAccessoryParametersTableToAParameters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accessory_parameters', function (Blueprint $table) {
            Schema::rename('accessory_parameters', 'a_parameters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('a_parameters', function (Blueprint $table) {
            Schema::rename('a_parameters', 'accessory_parameters');
        });
    }
}
