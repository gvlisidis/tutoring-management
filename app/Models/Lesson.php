<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model {

    protected $guarded = [ 'id', 'created_at', 'updated_at', ];

    public function user() {
        return $this->belongsTo( User::class );
    }

    public function student() {
        return $this->belongsTo( Student::class );
    }

    public function course() {
        return $this->belongsTo( Course::class );
    }

    public function setDateAttribute( $date ) {
        $this->attributes['date'] = Carbon::createFromFormat( 'd/m/Y', $date );
    }

    public function getFormattedDateAttribute() {
        if ( ! $this->exists ) {
            return '';
        }

        return empty( $this->date ) ? '' : $this->date->format( 'd/m/Y' );
    }

    public function setTimeAttribute( $time ) {
        $this->attributes['date'] = Carbon::createFromFormat( 'h:i', $time );
    }

    public function getFormattedTimeAttribute() {
        if ( ! $this->exists ) {
            return '';
        }

        return empty( $this->time ) ? '' : $this->time->format( 'h:i' );
    }
}
