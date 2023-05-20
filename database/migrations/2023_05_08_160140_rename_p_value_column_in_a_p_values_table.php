<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePValueColumnInAPValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('a_p_values', function (Blueprint $table) {
            $table->renameColumn('p_value', 'a_p_value');
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
            $table->renameColumn('a_p_value', 'p_value');
        });
    }
}
