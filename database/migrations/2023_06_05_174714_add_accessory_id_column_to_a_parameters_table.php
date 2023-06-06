<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccessoryIdColumnToAParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('a_parameters', function (Blueprint $table) {
            $table->integer('accessory_id');
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
            $table->dropColumn('accessory_id');
        });
    }
}
