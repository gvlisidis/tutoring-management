<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    protected $guarded = [ 'id', 'created_at', 'updated_at', ];

    public function user() {
        return $this->belongsTo( User::class );
    }

    public function courses() {
        return $this->belongsToMany( Course::class )
            ->withPivot('date', 'time', 'notes', 'price', 'paid')
            ->withTimestamps();
    }
}
