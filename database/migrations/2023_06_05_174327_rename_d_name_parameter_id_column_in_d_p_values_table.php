<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameDNameParameterIdColumnInDPValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('d_p_values', function (Blueprint $table) {
            $table->renameColumn('d_name_d_parameter_id', 'd_parameter_id');
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
            $table->renameColumn('d_parameter_id', 'd_name_d_parameter_id');
        });
    }
}
