<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropAccessoryAParameterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('accessory_a_parameter');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('accessory_a_parameter', function (Blueprint $table) {
            // Определите структуру таблицы в соответствии с вашими требованиями
            // Включите все необходимые столбцы, индексы и ограничения

            $table->id();
            $table->integer('accessory_id');
            $table->integer('a_parameter_id');
            // Добавьте другие столбцы по вашему усмотрению

            $table->timestamps();
        });
    }
}
