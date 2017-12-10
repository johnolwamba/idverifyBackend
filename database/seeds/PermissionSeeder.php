<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'block-staff',
            'unblock-staff',
            'view-staff',
            'delete-student',
            'delete-staff',
            'update-user',
            'block-student',
            'unblock-student',
            'view-reports',
            'do-admin-tasks'
        ];

        foreach ($permissions as $permission){
            $new_permission = Permission::firstOrCreate(['guard_name' => 'web','name' => $permission]);
        }

    }
}
