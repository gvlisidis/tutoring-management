<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration {

    public function up() {
        Schema::create( 'lessons', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'student_id' );
            $table->integer( 'course_id' );
            $table->date( 'date' )->nullable();
            $table->time( 'time_from' )->nullable();
            $table->time( 'time_to' )->nullable();
            $table->text( 'notes' )->nullable();
            $table->integer( 'price' )->nullable();
            $table->boolean( 'paid' )->default( false );
            $table->timestamps();
        } );
    }

    public function down() {
        Schema::dropIfExists( 'lessons' );
    }
}
