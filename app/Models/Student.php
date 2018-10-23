<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function newQuery( $excludeDeleted = true ) {
        return parent::newQuery( $excludeDeleted )->whereTypeId( 2 );
    }

}
