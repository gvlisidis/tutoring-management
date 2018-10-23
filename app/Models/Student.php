<?php

namespace App\Models;


class Student extends User
{
    public function newQuery( $excludeDeleted = true ) {
        return parent::newQuery( $excludeDeleted )->whereTypeId( 2 );
    }

}
