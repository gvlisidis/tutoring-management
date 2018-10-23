<?php

namespace App\Models;


class Teacher extends User
{
    public function newQuery( $excludeDeleted = true ) {
        return parent::newQuery( $excludeDeleted )->whereTypeId( 1 );
    }
}
