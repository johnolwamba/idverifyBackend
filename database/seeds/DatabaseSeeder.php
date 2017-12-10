<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CoursesTableSeeder::class);
        $this->call(GatesTableSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(RoleSeeder::class);
    }
}
