<?php

namespace App\Services;

use Carbon\Carbon;

class StatisticDataService {

    public function coursePopularity( $courses ) {
        $coursePopularity = collect();
        foreach ( $courses as $course ) {
            $coursePopularity->push( [ 'name' => $course->name, 'students' => $course->students->where( 'user_id', auth()->id() )->count() ] );
        }

        return $coursePopularity;
    }

    public function studendsPerYearClass( $courses ) {
        $year            = collect();
        $studentsPerYear = $courses->groupBy( 'year' );
        foreach ( $studentsPerYear as $id => $numcourses ) {
            $temp = collect();
            $numcourses->each( function ( $course ) use ( $temp ) {
                $temp->push( $course->students->where( 'user_id', auth()->id() )->count() );
            } );
            $year->push( [ 'year' => $id, 'number' => $temp->sum() ] );
        }

        return $year;
    }

    public function studentsPerYear( ) {
        $students = auth()->user()->students();

        $startYear = $students->first()->created_at->year;
        // dd(Carbon::now()->year);
        $mystudents = collect();

        for ( $i = $startYear; $i <= Carbon::now()->year; $i++ ) {
            $students = auth()->user()->students();
            $numOfStudents = $students->whereYear( 'created_at', '=', $i )->count();
            $mystudents->push( [ 'year' => $i, 'numOfStudents' => $numOfStudents ] );
        }

        return $mystudents;

    }
}
