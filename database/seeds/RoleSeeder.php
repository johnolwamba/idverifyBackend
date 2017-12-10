<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Admin',
            'Staff',
            'Student'
        ];

        foreach ($roles as $role){
            $myroles = \Spatie\Permission\Models\Role::firstOrCreate(['guard_name' => 'web','name' => $role]);
        }

    }
}
