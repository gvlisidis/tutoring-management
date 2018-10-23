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
}
