<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = Role::firstOrCreate([
            'name' => 'Admin'
        ]);

        $admin_permissions = [
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

        foreach ($admin_permissions as $admin_permission){

            if(!$admin->hasPermissionTo($admin_permission)) {
                $admin->givePermissionTo($admin_permission);

            }
        }

        $user = User::firstOrCreate([
            'name' => 'System Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'id_number' => '2972272',
            'status' => '1'
        ]);

        if(!$user->hasRole($admin)){
            $user->assignRole($admin);
        }


        User::firstOrCreate([
            'name' => 'Johnstone Ananda',
            'email' => 'johnolwamba@gmail.com',
            'password' => bcrypt('123456'),
            'id_number' => '29722724',
            'status' => '1'
        ]);

        User::firstOrCreate([
            'name' => 'Brenda Mwende',
            'email' => 'brenda@gmail.com',
            'password' => bcrypt('123456'),
            'id_number' => '123456',
            'status' => '1'
        ]);

        User::firstOrCreate([
            'name' => 'System User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
            'id_number' => '29722721',
            'status' => '1'
        ]);

        User::firstOrCreate([
            'name' => 'System User 2',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('123456'),
            'id_number' => '29722722',
            'status' => '1'
        ]);

        User::firstOrCreate([
            'name' => 'System User 3',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('123456'),
            'id_number' => '29722723',
            'status' => '1'
        ]);

        User::firstOrCreate([
            'name' => 'System User 4',
            'email' => 'user3@gmail.com',
            'password' => bcrypt('123456'),
            'id_number' => '29722725',
            'status' => '1'
        ]);


    }
}
