<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->integer('device_name_id');
            $table->integer('device_model_id');
            $table->integer('usaid_inventory')->nullable()->unique();
            $table->integer('rti_inventory')->nullable()->unique();
            $table->string('system_name')->nullable()->unique();
            $table->integer('parent_id')->nullable();
            $table->integer('purpose_id')->nullable();
            $table->string('serial_number')->unique();
            $table->integer('location_id');
            $table->integer('condition_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('imei')->nullable()->unique();
            $table->string('imei2')->nullable()->unique();
            $table->string('phone_number')->nullable()->unique();
            $table->ipAddress('ip_address')->nullable()->unique();
            $table->string('mac_address')->nullable()->unique();
            $table->string('ssid')->nullable()->unique();
            $table->string('wifi_key')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
