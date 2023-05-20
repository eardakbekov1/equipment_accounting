<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameParameterValueColumnInDPValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('d_p_values', function (Blueprint $table) {
            $table->renameColumn('parameter_value', 'd_p_value');
            $table->renameColumn('parameter_device_name_id', 'd_name_d_parameter_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('d_p_values', function (Blueprint $table) {
            $table->renameColumn('d_p_value', 'parameter_value');
            $table->renameColumn('d_name_d_parameter_id', 'parameter_device_name_id');
        });
    }
}
