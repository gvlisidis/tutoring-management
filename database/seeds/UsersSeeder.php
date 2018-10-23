<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {

    public function run() {
        User::create( [ 'name' => 'George', 'lastname' => 'Vlisidis', 'email' => 'gblisidis@gmail.com', 'password' => bcrypt( 'password' ) ] );
        User::create( [ 'name' => 'Zina', 'lastname' => 'Skoufa', 'email' => 'zina@gmail.com', 'password' => bcrypt( 'password' ) ] );
        User::create( [ 'name' => 'Thanos', 'lastname' => 'Karalis', 'email' => 'thanos@gmail.com', 'password' => bcrypt( 'password' ) ] );
        User::create( [ 'name' => 'Giannis', 'lastname' => 'Lykidis', 'email' => 'giannis@gmail.com', 'password' => bcrypt( 'password' ) ] );
        User::create( [ 'name' => 'Maria', 'lastname' => 'Panagiotou', 'email' => 'maria@gmail.com', 'password' => bcrypt( 'password' ) ] );
        User::create( [ 'name' => 'Katerina', 'lastname' => 'Dimitriadou', 'email' => 'katerina@gmail.com', 'password' => bcrypt( 'password' ) ] );
        User::create( [ 'name' => 'Kostas', 'lastname' => 'Vardalis', 'email' => 'kostas@gmail.com', 'password' => bcrypt( 'password' ) ] );
        User::create( [ 'name' => 'Panos', 'lastname' => 'Salpiggidis', 'email' => 'panos@gmail.com', 'password' => bcrypt( 'password' ) ] );
    }
}
