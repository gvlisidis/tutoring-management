<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveStudentRequest;
use App\Models\Course;
use App\Models\Student;

class StudentsController extends Controller {

    public function index() {
        $students = auth()->user()->students()->paginate( 10 );

        return view( 'students.index', compact( 'students' ) );
    }

    public function create() {
        return view( 'students.form',
            [
                'student' => new Student,
                'courses' => Course::all(),
                'method'  => 'store',
            ] );
    }

    public function store( SaveStudentRequest $request ) {
        $student = Student::create( [
            'name'      => $request->get( 'name' ),
            'lastname'  => $request->get( 'lastname' ),
            'telephone' => $request->get( 'telephone' ),
            'gender'    => $request->get( 'gender' ),
            'email'     => $request->get( 'email' ),
            'address'   => $request->get( 'address' ),
            'user_id'   => auth()->user()->id,
        ] );

        $coursesToRegister = request()->get( 'register' );
        if ( isset( $coursesToRegister ) ) {
            foreach ( $coursesToRegister as $id => $course ) {
                $student->courses()->attach( $id );
            }
        }

        return redirect()->route( 'students.index' )->with( 'success', 'Student created successfully.' );
    }

    public function edit( Student $student ) {
        return view( 'students.form', [
            'student'         => $student,
            'courses'         => Course::all(),
            'method'          => 'update',
            'assignedCourses' => $student->courses->pluck( 'id' )->toArray(),
        ] );
    }

    public function update( SaveStudentRequest $request, Student $student ) {
        $assignedCourses = $student->courses;
        if ( isset( $assignedCourses ) ) {
            foreach ( $assignedCourses as $course ) {
                $student->courses()->detach( $course->id );
            }
        }

        $student->update( [
            'name'      => $request->get( 'name' ),
            'lastname'  => $request->get( 'lastname' ),
            'telephone' => $request->get( 'telephone' ),
            'gender'    => $request->get( 'gender' ),
            'email'     => $request->get( 'email' ),
            'address'   => $request->get( 'address' ),
        ] );

        $coursesToRegister = request()->get( 'register' );
        if ( isset( $coursesToRegister ) ) {
            foreach ( $coursesToRegister as $id => $course ) {
                $student->courses()->attach( $id );
            }
        }

        return redirect()->route( 'students.index' )->with( 'success', 'Student updated successfully.' );
    }

    public function archive() {
        return view( 'students.archived', [
            'archived_students' => Student::onlyTrashed()->where( 'user_id', auth()->user()->id )->get(),
        ] );
    }

    public function restore( $id ) {
        Student::onlyTrashed()->findOrFail( $id )->restore();

        return redirect()->back()->with( 'success', 'Student has been restored successfully!' );
    }

    public function destroy( Student $student ) {
        $student->delete();

        return redirect()->route( 'students.index' )->with( 'success', 'Student has been archived successfully.' );
    }

}
