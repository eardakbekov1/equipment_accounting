<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['Storage', 'Handovered'];

        foreach ($statuses as $status) {
                Status::firstOrCreate([
                    'name' => $status
                ]);
        }
    }
}
