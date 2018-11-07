<?php

use App\Models\Course;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder {

    public function run() {
        Course::create( [ 'name' => 'Mathimatika A', 'user_id' => 1 ] );
        Course::create( [ 'name' => 'Mathimatika B', 'user_id' => 1 ] );
        Course::create( [ 'name' => 'Mathimatika G', 'user_id' => 1 ] );
        Course::create( [ 'name' => 'Pliroforiki B', 'user_id' => 1 ] );
        Course::create( [ 'name' => 'Pliroforiki G', 'user_id' => 1 ] );
    }
}
