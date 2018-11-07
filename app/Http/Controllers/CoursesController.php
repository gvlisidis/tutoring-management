<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCourseRequest;
use App\Models\Course;

class CoursesController extends Controller {

    public function index() {
        $courses = auth()->user()->courses()->paginate( 10 );

        return view( 'courses.index', compact( 'courses' ) );
    }

    public function edit( Course $course ) {
        return view( 'courses.form', [
            'course' => $course,
            'method' => 'update',
        ] );
    }

    public function update( SaveCourseRequest $request, Course $course ) {
        $course->update( [
            'name'    => $request->get( 'name' ),
            'user_id' => auth()->id(),
        ] );

        return redirect()->route( 'courses.index' )->with( 'success', 'Course updated successfully.' );
    }

    public function create() {
        return view( 'courses.form', [
            'course' => new Course,
            'method' => 'store',
        ] );
    }

    public function store( SaveCourseRequest $request, Course $course ) {
        $course->create( [
            'name'    => $request->get( 'name' ),
            'user_id' => auth()->id(),
        ] );

        return redirect()->route( 'courses.index' )->with( 'success', 'Course created successfully.' );
    }

    public function destroy( Course $course ) {
        $course->delete();

        return redirect()->back()->with( 'success', 'Course deleted successfully.' );
    }

}
