<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameParameterIdColumnInDNameDParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('d_name_d_parameters', function (Blueprint $table) {
            $table->renameColumn('parameter_id', 'd_parameter_id');
            $table->renameColumn('device_name_id', 'd_name_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('d_name_d_parameters', function (Blueprint $table) {
            $table->renameColumn('d_parameter_id', 'parameter_id');
            $table->renameColumn('d_name_id', 'device_name_id');
        });
    }
}
