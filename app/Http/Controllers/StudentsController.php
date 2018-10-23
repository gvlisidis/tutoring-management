<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Models\Student;

class StudentsController extends Controller {

    public function index() {
        $students = Student::paginate( 10 );

        return view( 'students.index', compact( 'students' ) );
    }
    public function create() {
        return view( 'students.form',
            [
                'student' => new Student,
                'method'  => 'store',
            ] );
    }

    public function store( SaveUserRequest $request, Student $student ) {
        $student->create( [
            'name'     => $request->get( 'name' ),
            'lastname' => $request->get( 'lastname' ),
            'email'    => $request->get( 'email' ),
            'type_id'  => 2,
            'password' => bcrypt( $request->get( 'password' ) ),
        ] );

        return redirect()->route( 'students.index' )->with( 'success', 'Student created successfully.' );
    }

    public function edit( Student $student ) {
        return view( 'students.form', [
            'student' => $student,
            'method'  => 'update',
        ] );
    }

    public function update( SaveUserRequest $request, Student $student ) {
        $student->update( [
            'name'     => $request->get( 'name' ),
            'lastname' => $request->get( 'lastname' ),
            'email'    => $request->get( 'email' ),
            'password' => $request->has( 'password' ) ? bcrypt( $request->get( 'password' ) ) : $student->password,
        ] );

        return redirect()->route( 'students.index' )->with( 'success', 'Student updated successfully.' );
    }

    public function destroy( Student $student ) {
        $student->delete();

        return redirect()->back()->with( 'success', 'Student deleted successfully.' );
    }
}
