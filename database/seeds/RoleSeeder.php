<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = new Role();
        $owner->name  = 'Admin';
        $owner->save();


        $owner = new Role();
        $owner->name  = 'Security';
        $owner->save();

        $owner = new Role();
        $owner->name  = 'Student';
        $owner->save();

    }
}
