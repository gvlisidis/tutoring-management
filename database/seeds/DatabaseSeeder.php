<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run() {

        Model::unguard();
        $this->call( UsersSeeder::class );
        $this->call( CoursesSeeder::class );
        $this->call( StudentsSeeder::class );
        $this->call( LessonsSeeder::class );
        Model::reguard();
    }
}
