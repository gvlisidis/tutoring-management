<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {

    public function run() {
        User::create( [ 'name' => 'George', 'lastname' => 'Vlisidis', 'email' => 'gblisidis@gmail.com', 'password' => bcrypt( 'password' ), 'type_id' => 1 ] );
        User::create( [ 'name' => 'Zina', 'lastname' => 'Skoufa', 'email' => 'zina@gmail.com', 'password' => bcrypt( 'password' ), 'type_id' => 2 ] );
    }
}
