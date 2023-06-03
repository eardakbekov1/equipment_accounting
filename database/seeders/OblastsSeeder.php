<?php

namespace Database\Seeders;

use App\Models\Oblast;
use Illuminate\Database\Seeder;

class OblastsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $oblasts = ['Bishkek', 'Osh_city', 'Chui', 'Talas', 'Issyk-Kul', 'Naryn', 'Osh', 'Jalal-Abad', 'Batken'];

        // Создание записей в таблице oblasts
        foreach ($oblasts as $oblast){
            Oblast::create(['name' => $oblast]);
        }
    }
}
