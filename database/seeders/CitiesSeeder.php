<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\District;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            'Kant' => 'Ysyk-Atinskii',
            'Kopure-Bazar' => 'Talasskii',
            'Cholpon-Ata' => 'Issyk-Kulskii',
            'Vosmoe-Marta' => 'Narynskii',
            'Kara-Suu' => 'Kara-Suuiskii',
            'Suzak' => 'Suzakskii',
            'Ak-Sai' => 'Batkenskii',
            'Bishkek-Leninskii' => 'Leninskii',
            'Bishkek-Oktyabrskii' => 'Oktyabrskii',
            'Bishkek-Pervomaiskii' => 'Pervomaiskii',
            'Bishkek-Sverdlovskii' => 'Sverdlovskii'
        ];

        // Создание записей в таблице cities
        foreach ($cities as $city => $districtName){
        try {
                $district = District::where('name', '=', $districtName)->first();
                if ($district) {
                    $districtId = $district->id;

                    City::firstOrCreate([
                        'name' => $city,
                        'district_id' => $districtId
                    ]);
                }
                else{
                    throw new Exception('District не найден: ' . $districtName);
                }
        } catch (Exception $e) {
            Log::error('Ошибка в сидере CitiesSeeder: ' . $e->getMessage());
        }
        }
    }
}
