<?php

use App\Models\Course;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{

    public function run()
    {
        Course::create(['name' => 'Mathimatika A']);
        Course::create(['name' => 'Mathimatika B']);
        Course::create(['name' => 'Mathimatika G']);
        Course::create(['name' => 'Pliroforiki B']);
        Course::create(['name' => 'Pliroforiki G']);
    }
}
