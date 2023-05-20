<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameBranchDepartmentsTableToBranchDepartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('branch_departments', function (Blueprint $table) {
            Schema::rename('branch_departments', 'branch_department');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('branch_department', function (Blueprint $table) {
            Schema::rename('branch_department', 'branch_departments');
        });
    }
}
