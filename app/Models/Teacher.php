<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function newQuery( $excludeDeleted = true ) {
        return parent::newQuery( $excludeDeleted )->whereTypeId( 1 );
    }
}
