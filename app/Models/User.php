<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    use Notifiable;

    protected $fillable = [ 'name', 'email', 'lastname', 'type_id', 'password', ];

    protected $hidden = [ 'password', 'remember_token', ];

    public function students() {
        return $this->hasMany( Student::class );
    }

    public function courses() {
        return $this->hasMany( Course::class );
    }

    public function lessons() {
        return $this->hasManyThrough( Lesson::class, Course::class );
    }

}
