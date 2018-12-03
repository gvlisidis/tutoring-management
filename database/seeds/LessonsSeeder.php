<?php

use App\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonsSeeder extends Seeder
{
    public function run() {
        factory( Lesson::class, 500 )->create();
    }
}
