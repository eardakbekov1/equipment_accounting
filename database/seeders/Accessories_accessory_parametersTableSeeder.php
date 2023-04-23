<?php

namespace Database\Seeders;

use App\Models\Accessories_accessory_parameter;
use App\Models\Accessory;
use App\Models\Accessory_parameter;
use App\Models\Accessory_parameters_value;
use App\Models\User;
use Illuminate\Database\Seeder;

class Accessories_accessory_parametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accessory = Accessory::first();
        $accessory_parameter = Accessory_parameter::first();
        $accessories_accessory_parameter = Accessories_accessory_parameter::all();
        $accessory_parameters_value = Accessory_parameters_value::all();

        User::create([
            'accessory_id' => $accessory->id,
            'accessory_parameter_id' => $accessory_parameter->id
        ]);
    }
}
