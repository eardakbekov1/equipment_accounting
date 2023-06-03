<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Oblast;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            'Leninskii' => 'Bishkek',
            'Pervomaiskii' => 'Bishkek',
            'Oktyabrskii' => 'Bishkek',
            'Sverdlovskii' => 'Bishkek',
            'Ysyk-Atinskii' => 'Chui',
            'Talasskii' => 'Talas',
            'Issyk-Kulskii' => 'Issyk-Kul',
            'Narynskii' => 'Naryn',
            'Kara-Suuiskii' => 'Osh',
            'Suzakskii' => 'Jalal-Abad',
            'Batkenskii' => 'Batken',
        ];

        foreach ($districts as $district => $oblastName){
        try {
        // Создание записей в таблице districts
            $oblast = Oblast::where('name', '=', $oblastName)->first();
            if ($oblast) {
                $oblastId = $oblast->id;

                District::firstOrCreate([
                    'name' => $district,
                    'oblast_id' => $oblastId
                ]);
            }
            else{
                throw new Exception('Оblast не найден: ' . $oblastName);
            }
        } catch (Exception $e) {
            Log::error('Ошибка в сидере DistrictsSeeder: ' . $e->getMessage());
        }
        }
    }
}
