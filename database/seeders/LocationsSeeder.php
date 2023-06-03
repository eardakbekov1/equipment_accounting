<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\City;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            'Storage' => 'Bishkek-Pervomaiskii',
            'Erkindik 30/1' => 'Bishkek-Pervomaiskii'
        ];

        foreach ($locations as $location => $cityName){
            try {
                // Создание записей в таблице locations
                $city = City::where('name', '=', $cityName)->first();
                if ($city) {
                    $cityId = $city->id;

                    Location::firstOrCreate([
                        'address' => $location,
                        'city_id' => $cityId
                    ]);
                }
                else{
                    throw new Exception('City не найден: ' . $cityName);
                }
            } catch (Exception $e) {
                Log::error('Ошибка в сидере locationsSeeder: ' . $e->getMessage());
            }
        }
    }
}
