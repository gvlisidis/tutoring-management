<?php

namespace App\Http\Controllers;

use App\Models\Student;

class UsersController extends Controller {

    public function students() {
        $students = Student::all();

        return view( 'students.index', compact( 'students' ) );
    }
}
