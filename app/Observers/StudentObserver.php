<?php

namespace App\Observers;

use App\Models\Student;

class StudentObserver {

    public function created( Student $student ) {
        $student->courses()->attach( $this->UniqueRandomNumbersWithinRange( 1, 5, rand( 1, 5 ) ) );
    }

    function UniqueRandomNumbersWithinRange( $min, $max, $quantity ) {
        $numbers = range( $min, $max );
        shuffle( $numbers );

        return array_slice( $numbers, 0, $quantity );
    }

}
