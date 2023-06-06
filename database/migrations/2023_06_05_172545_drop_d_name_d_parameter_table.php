<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropDNameDParameterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('d_name_d_parameter');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('d_name_d_parameter', function (Blueprint $table) {
            // Определите структуру таблицы в соответствии с вашими требованиями
            // Включите все необходимые столбцы, индексы и ограничения

            $table->id();
            $table->integer('d_parameter_id');
            $table->integer('d_name_id');
            // Добавьте другие столбцы по вашему усмотрению

            $table->timestamps();
        });
    }
}
