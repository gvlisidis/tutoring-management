<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    protected $guarded = [ 'id', 'created_at', 'updated_at', ];

    public function user() {
        return $this->belongsTo( User::class );
    }

    public function courses() {
        return $this->belongsToMany( Course::class );
    }

    public function lessons() {
        return $this->hasMany( Lesson::class );
    }

    public function totalAmount() {
        return number_format( $this->lessons->sum( 'price' ) / 10, 1 );
    }

    public function calculatePaidLessons() {
        return number_format( $this->lessons->where('paid', 1 )->sum( 'price' ) / 10, 1 );
    }
}
