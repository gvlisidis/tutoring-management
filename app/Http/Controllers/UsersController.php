<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Models\Course;
use App\Services\StatisticDataService;

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

    public function myStats( StatisticDataService $service) {
        $students = auth()->user()->students;
        $courses  = Course::all();

        // Students by gender graph
        $numOfStudents = $students->count();
        $numOfBoys     = $students->where( 'gender', '==', 'male' )->count();
        $numOfGirls    = $numOfStudents - $numOfBoys;

        // Students per class graph
        $year = $service->studendsPerYearClass( $courses );

        //  Course popularity graph
        $coursePopularity = $service->coursePopularity( $courses );

        //studentsPerYear
        $studentsPerYear = $service->studentsPerYear();

        return view( 'user.mystats', compact( 'numOfBoys', 'numOfGirls', 'coursePopularity', 'year', 'studentsPerYear' ) );
    }

}
