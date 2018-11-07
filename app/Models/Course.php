<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    protected $guarded = [ 'id', 'created_at', 'updated_at', ];

    public function student() {
        return $this->belongsToMany( Student::class );
    }

    public function user() {
        return $this->belongsTo( User::class );
    }
}
