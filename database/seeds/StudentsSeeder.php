<?php

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder {

    public function run() {
        factory( Student::class, 150 )->create();
    }
}
