<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAccessoryAParameterIdColumnInAPValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('a_p_values', function (Blueprint $table) {
            $table->renameColumn('accessory_a_parameter_id', 'a_parameter_id');
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
            $table->renameColumn('a_parameter_id', 'accessory_a_parameter_id');
        });
    }
}
