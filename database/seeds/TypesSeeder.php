<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder {

    public function run() {
        Type::create( [ 'name' => 'teacher' ] );
        Type::create( [ 'name' => 'student' ] );
    }
}
