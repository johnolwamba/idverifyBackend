<?php

use Illuminate\Database\Seeder;
use App\Courses;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = new Courses();
        $course->name = 'Mobile Telecommunications And Innovation';
        $course->short_code = 'MTI';
        $course->save();


        $course = new Courses();
        $course->name = 'Master of Applied Philosophy and Ethics';
        $course->short_code = 'MAPE';
        $course->save();


        $course = new Courses();
        $course->name = 'Master of Science in Education Management';
        $course->short_code = 'MSc.EM';
        $course->save();

        $course = new Courses();
        $course->name = 'Master of Commerce';
        $course->short_code = 'MCOM';
        $course->save();

        $course = new Courses();
        $course->name = 'Bachelor of Commerce';
        $course->short_code = 'BCom';
        $course->save();




    }
}
