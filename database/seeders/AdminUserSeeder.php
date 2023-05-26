<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Создаем пользователя admin
        $admin = User::create([
            'name' => 'admin',
            'email' => 'equipment284@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        // Присваиваем роль admin пользователю
        $adminRole = Role::where('name', 'admin')->first();
        $admin->assignRole($adminRole);
    }
}
