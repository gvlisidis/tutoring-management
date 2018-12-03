<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model {

    use SoftDeletes;

    protected $guarded = [ 'id', 'created_at', 'updated_at', 'deleted_at' ];

    protected $dates = ['deleted_at'];

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
        return number_format( $this->lessons->sum( 'price' ) / 100, 1 );
    }

    public function calculatePaidLessons() {
        return number_format( $this->lessons->where('paid', 1 )->sum( 'price' ) / 100, 1 );
    }

    public function setCreatedAtAttribute( $date ) {
        $this->attributes['created_at'] = Carbon::createFromFormat( 'd/m/Y', $date );
    }

    public function getFormattedCreatedAtAttribute() {
        if ( ! $this->exists ) {
            return '';
        }

        return empty( $this->created_at ) ? '' : $this->created_at->format( 'd/m/Y' );
    }



}
