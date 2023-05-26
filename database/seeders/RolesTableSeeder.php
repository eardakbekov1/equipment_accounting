<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'reviewer']);
        Role::firstOrCreate(['name' => 'user']);

        $adminRole = Role::where('name', 'admin')->first();

        $permissions = [
            Permission::firstOrCreate(['name' => 'read']),
            Permission::firstOrCreate(['name' => 'CUD'])
        ];

        foreach ($permissions as $permission){
            $adminRole->givePermissionTo($permission);
        }

        $reviewerRole = Role::where('name', 'reviewer')->first();
        $reviewerRole->givePermissionTo($permissions[0]);
    }
}
