<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Models\Course;

class UsersController extends Controller {

    public function students() {
        $students = auth()->user()->students()->paginate( 10 );

        return view( 'students.index', compact( 'students' ) );
    }

    public function editAccount() {
        return view( 'user.form', [
            'user'   => auth()->user(),
            'method' => 'update-account',
            'title'  => 'My account',
        ] );
    }

    public function updateAccount( SaveUserRequest $request ) {
        auth()->user()->update( [
            'name'     => $request->get( 'name' ),
            'lastname' => $request->get( 'lastname' ),
            'email'    => $request->get( 'email' ),
            'password' => $request->has( 'password' ) ? bcrypt( $request->get( 'password' ) ) : auth()->user()->password,
        ] );

        return redirect()->route( 'students.index' )->with( 'success', 'Your account has been updated successfully!' );
    }

    public function myStats() {
        $students = auth()->user()->students;
        $courses       = Course::all();

        // Students by gender graph
        $numOfStudents = $students->count();
        $numOfBoys     = $students->where( 'gender', 1 )->count();
        $numOfGirls    = $numOfStudents - $numOfBoys;


        // Students per class graph
        $year            = collect();
        $studentsPerYear = $courses->groupBy( 'year' );
        foreach ( $studentsPerYear as $id => $numcourses ) {
            $temp = collect();
            $numcourses->each( function ( $course ) use ( $temp ) {
                $temp->push( $course->students->where('user_id', auth()->id() )->count() );
            } );
            $year->push( [ 'year' => $id, 'number' => $temp->sum() ] );
        }

        //  Course popularity graph
        $coursePopularity = collect();
        foreach ( $courses as $course ) {
            $coursePopularity->push( [ 'name' => $course->name, 'students' => $course->students->where('user_id', auth()->id() )->count() ] );
        }
       // dd($coursePopularity);

        return view( 'user.mystats', compact( 'numOfBoys', 'numOfGirls', 'coursePopularity', 'year' ) );
    }
}
