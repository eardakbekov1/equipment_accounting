<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAccessoryAccessoryParameterIdColumnInAPValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('a_p_values', function (Blueprint $table) {
            $table->renameColumn('parameter_value', 'p_value');
            $table->renameColumn('accessory_accessory_parameter_id', 'accessory_a_parameter_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('a_p_values', function (Blueprint $table) {
            $table->renameColumn('p_value', 'parameter_value');
            $table->renameColumn('accessory_a_parameter_id', 'accessory_accessory_parameter_id');
        });
    }
}
