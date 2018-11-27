<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration {

    public function up() {
        Schema::create( 'students', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->string( 'name' );
            $table->string( 'lastname' );
            $table->string( 'telephone' )->nullable();
            $table->string( 'address' );
            $table->string( 'gender' );
            $table->integer( 'user_id' );
            $table->string( 'email' )->unique();
            $table->timestamps();
            $table->softDeletes();
        } );
    }

    public function down() {
        Schema::dropIfExists( 'students' );
    }
}
