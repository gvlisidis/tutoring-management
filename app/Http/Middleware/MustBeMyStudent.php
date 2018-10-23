<?php

namespace App\Http\Middleware;

use App\Models\Student;
use Closure;

class MustBeMyStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $student = $request->route('student');
        $check = Student::where('id', $student->id)->where('user_id', auth()->user()->id)->first();

        if($check)
        {
            return $next($request);
        }

        return redirect()->to('/')->with('error', 'Permission denied');
    }
}
