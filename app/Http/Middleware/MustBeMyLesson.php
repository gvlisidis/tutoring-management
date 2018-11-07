<?php

namespace App\Http\Middleware;

use Closure;

class MustBeMyLesson
{

    public function handle($request, Closure $next)
    {
        $lesson = $request->route( 'lesson' );
        $check   = Lesson::where( 'id', $lesson->id )->where( 'user_id', auth()->id() )->first();

        if ( $check ) {
            return $next( $request );
        }

        return redirect()->to( '/lessons' )->with( 'error', 'Permission denied' );
    }
}
