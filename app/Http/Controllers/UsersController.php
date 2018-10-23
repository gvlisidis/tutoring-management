<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Models\Student;

class UsersController extends Controller {

    public function students() {
        $students = Student::all();

        return view( 'students.index', compact( 'students' ) );
    }

    public function editAccount() {
        return view( 'user.form', [
            'admin'   => auth()->user(),
            'method' => 'update-account',
            'title'  => 'My account',
        ] );
    }
    public function updateAccount( SaveUserRequest $request ) {
        auth()->user()->update( [
            'name'     => $request->get( 'name' ),
            'email'    => $request->get( 'email' ),
            'password' => $request->has( 'password' ) ? bcrypt( $request->get( 'password' ) ) : auth()->user()->password,
        ] );
        return redirect()->route('user.index')->with( 'success', 'Your account has been updated successfully!' );
    }
}
