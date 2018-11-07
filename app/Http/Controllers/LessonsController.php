<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Http\Request;

class LessonsController extends Controller {

    public function index( Student $student ) {
        $lessons = $student->lessons()->paginate( 10 );

        return view( 'lessons.index', compact( 'student', 'lessons' ) );
    }

    public function create( Student $student) {
        return view( 'lessons.form', [
            'lesson'            => new Lesson,
            'method'            => 'store',
            'registeredCourses' => $student->courses,
        ] );
    }

    public function store( Request $request, Student $student ) {

        $lesson = Lesson::create( [
            'course_id'  => $request->get( 'course_id' ),
            'student_id' => $student->id,
            'date'       => $request->get( 'date' ),
            'time'       => $request->get( 'time' ),
            'price'      => $request->get( 'price' ),
            'notes'      => $request->get( 'notes' ),
        ] );

        return redirect()->route( 'lessons.index', compact( 'newLesson', 'registeredCourses', 'lessons', 'student' ) );
    }
}
