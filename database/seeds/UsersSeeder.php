<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Students;
use App\Staff;
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
        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('123456');
        $user->id_number = '29722724';
        $user->status = 1;
        $user->save();

        $admin = Role::where('name','Admin')->first();
        $user->assignRole($admin);


        $user = new User;
        $user->name = 'Johnstone Ananda';
        $user->email = 'johnolwamba@gmail.com';
        $user->password = bcrypt('123456');
        $user->id_number = '29722723';
        $user->status = 1;
        $user->save();

        $admin = Role::where('name','Security')->first();
        $user->assignRole($admin);


        $user = new User;
        $user->name = 'Brenda Test';
        $user->email = 'brenda@gmail.com';
        $user->password = bcrypt('123456');
        $user->id_number = '123456';
        $user->status = 1;

        $admin = Role::where('name','Student')->first();
        $user->assignRole($admin);

    }
}
