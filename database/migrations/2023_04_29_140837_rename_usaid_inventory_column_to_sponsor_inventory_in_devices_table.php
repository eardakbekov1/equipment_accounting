<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameUsaidInventoryColumnToSponsorInventoryInDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->renameColumn('usaid_inventory', 'sponsor_inventory');
            $table->renameColumn('rti_inventory', 'implementer_inventory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->renameColumn('sponsor_inventory', 'usaid_inventory');
            $table->renameColumn('implementer_inventory', 'rti_inventory');
        });
    }
}
