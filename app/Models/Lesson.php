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

    public function setTimeAttribute( $time ) {
        $this->attributes['time'] = Carbon::createFromFormat( 'H:i A', $time );
    }

    public function getFormattedTimeAttribute() {
        if ( ! $this->exists ) {
            return '';
        }

        return empty( $this->time ) ? '' : substr( $this->time, 0, 5 );

    }

    public function setPriceAttribute( $price ) {
        $this->attributes['price'] = $price * 10;
    }

    public function getFormattedPriceAttribute() {
        return number_format( $this->getAttribute( 'price' ) / 10, 1 );
    }

    public function getFormattedPaidAttribute() {
        return $this->getAttribute( 'paid' ) == 1 ? 'Yes' : 'No';
    }


}
