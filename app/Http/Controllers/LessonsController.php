<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveLessonRequest;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Student;

class LessonsController extends Controller {

    public function index( Student $student ) {

        $lessons           = $student->lessons()->paginate( 10 );
        $lesson            = new Lesson;
        $registeredCourses = $student->courses->isEmpty() ? Course::all() : $student->courses;
        $method            = 'store';

        return view( 'lessons.index', compact( 'student', 'lessons', 'lesson', 'registeredCourses', 'method' ) );
    }

    public function store( SaveLessonRequest $request, Student $student ) {

        $student->lessons()->create( [
            'course_id'  => $request->get( 'course_id' ),
            'student_id' => $student->id,
            'date'       => $request->get( 'date' ),
            'time_from'  => $request->get( 'time_from' ),
            'time_to'    => $request->get( 'time_to' ),
            'price'      => $request->get( 'price' ),
            'notes'      => $request->get( 'notes' ),
            'paid'       => $request->get( 'paid' ),
        ] );

        $lessons           = $student->lessons()->paginate( 10 );
        $lesson            = new Lesson;
        $registeredCourses = $student->courses->isEmpty() ? Course::all() : $student->courses;
        $method            = 'store';

        return redirect()->route( 'lessons.index', compact( 'student', 'lessons', 'lesson', 'registeredCourses', 'method' ) );
    }

    public function edit( Student $student, Lesson $newlesson ) {

        return view( 'lessons.index', [
            'student'           => $student,
            'lessons'           => $student->lessons()->paginate( 10 ),
            'lesson'            => $newlesson,
            'method'            => 'update',
            'registeredCourses' => $student->courses->isEmpty() ? Course::all() : $student->courses,
        ] );
    }

    public function update( SaveLessonRequest $request, Student $student, Lesson $lesson ) {
        $lesson->update( [
            'course_id'  => $request->get( 'course_id' ),
            'student_id' => $student->id,
            'date'       => $request->get( 'date' ),
            'time_from'  => $request->get( 'time_from' ),
            'time_to'    => $request->get( 'time_to' ),
            'price'      => $request->get( 'price' ),
            'notes'      => $request->get( 'notes' ),
            'paid'       => $request->get( 'paid' ),
        ] );

        $lessons           = $student->lessons()->paginate( 10 );
        $lesson            = new Lesson;
        $registeredCourses = $student->courses->isEmpty() ? Course::all() : $student->courses;
        $method            = 'store';

        return redirect()->route( 'lessons.index', compact( 'student', 'lessons', 'lesson', 'registeredCourses', 'method' ) );
    }
}
