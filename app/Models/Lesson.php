<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model {

    protected $guarded = [ 'id', 'created_at', 'updated_at', ];

    protected $dates = [ 'date' ];

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

    public function isOverdue() {
        return ( Carbon::now() > $this->date->addMonth( 1 ) && ! $this->paid );
    }

    public function setTimeFromAttribute( $time ) {
        $this->attributes['time_from'] = Carbon::createFromFormat( 'H:i A', $time );
    }

    public function getFormattedTimeFromAttribute() {
        if ( ! $this->exists ) {
            return '';
        }

        return empty( $this->time_from ) ? '' : substr( $this->time_from, 0, 5 );
    }

    public function setTimeToAttribute( $time ) {
        $this->attributes['time_to'] = Carbon::createFromFormat( 'H:i A', $time );
    }

    public function getFormattedTimeToAttribute() {
        if ( ! $this->exists ) {
            return '';
        }

        return empty( $this->time_to ) ? '' : substr( $this->time_to, 0, 5 );
    }

    public function setPriceAttribute( $price ) {
        $this->attributes['price'] = $price * 10;
    }

    public function getFormattedPriceAttribute() {
        return number_format( $this->getAttribute( 'price' ) / 100, 1 );
    }

    public function getFormattedPaidAttribute() {
        return $this->getAttribute( 'paid' ) == 1 ? 'Yes' : 'No';
    }

}
