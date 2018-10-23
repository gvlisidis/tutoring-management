<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration {

    public function up() {
        Schema::create( 'lessons', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'student_id' );
            $table->date( 'date' );
            $table->time( 'time' );
            $table->text( 'notes' );
            $table->integer( 'price' );
            $table->boolean( 'paid' )->default( false );
            $table->timestamps();
        } );
    }

    public function down() {
        Schema::dropIfExists( 'lessons' );
    }
}
