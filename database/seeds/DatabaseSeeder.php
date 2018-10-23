<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run() {

        Model::unguard();
        $this->call( TypesSeeder::class );
        $this->call( UsersSeeder::class );
        Model::reguard();
    }
}
