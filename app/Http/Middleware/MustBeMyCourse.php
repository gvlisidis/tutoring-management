<?php

namespace App\Http\Middleware;

use App\Models\Course;
use Closure;

class MustBeMyCourse
{
    public function handle($request, Closure $next)
    {
        $course = $request->route( 'course' );
        $check   = Course::where( 'id', $course->id )->where( 'user_id', auth()->id() )->first();

        if ( $check ) {
            return $next( $request );
        }

        return redirect()->to( '/courses' )->with( 'error', 'Permission denied' );
    }
}
