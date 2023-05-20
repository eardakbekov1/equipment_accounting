<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueConstraintToAccessoryAParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accessory_a_parameters', function (Blueprint $table) {
            $table->unique(['accessory_id', 'a_parameter_id']);
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
            $table->dropUnique(['accessory_id', 'a_parameter_id']);
        });
    }
}
