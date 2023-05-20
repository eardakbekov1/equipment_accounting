<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAccessoryParameterIdColumnInAccessoryAParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accessory_a_parameters', function (Blueprint $table) {
            $table->renameColumn('accessory_parameter_id', 'a_parameter_id');
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
            $table->renameColumn('a_parameter_id', 'accessory_parameter_id');
        });
    }
}
