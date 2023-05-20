<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAccessoriesAccessoryParameterIdColumnInAccessoryParameterValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accessory_parameter_values', function (Blueprint $table) {
            $table->renameColumn('accessories_accessory_parameter_id', 'accessory_accessory_parameter_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accessory_parameter_values', function (Blueprint $table) {
            $table->renameColumn('accessory_accessory_parameter_id', 'accessories_accessory_parameter_id');
        });
    }
}
