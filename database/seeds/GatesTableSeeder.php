<?php

use Illuminate\Database\Seeder;
use App\Gates;

class GatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $gates = new Gates();
        $gates->name = 'Phase 1 Front';
        $gates->description = 'Main Gate';
        $gates->save();

        $gates = new Gates();
        $gates->name = 'Phase 1 Back';
        $gates->description = 'Main Gate from behind admin';
        $gates->save();

        $gates = new Gates();
        $gates->name = 'Phase 2 Main';
        $gates->description = 'Main Gate for face 2';
        $gates->save();

        $gates = new Gates();
        $gates->name = 'Phase 2 Library';
        $gates->description = 'Main Gate to library';
        $gates->save();


    }
}
