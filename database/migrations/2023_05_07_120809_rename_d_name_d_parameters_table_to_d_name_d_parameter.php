<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameDNameDParametersTableToDNameDParameter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('d_name_d_parameters', function (Blueprint $table) {
            Schema::rename('d_name_d_parameters', 'd_name_d_parameter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('d_name_d_parameter', function (Blueprint $table) {
            Schema::rename('d_name_d_parameter', 'd_name_d_parameters');
        });
    }
}
