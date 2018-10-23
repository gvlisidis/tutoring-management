<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    use Notifiable;

    protected $fillable = [ 'name', 'email', 'lastname', 'type_id', 'password', ];

    protected $hidden = [ 'password', 'remember_token', ];

    public $table = 'users';

    public function isTeacher() {
        return $this->type_id == 1;
    }

    public function isStudent() {
        return $this->type_id == 2;
    }

    public function type() {
        return $this->belongsTo( Type::class );
    }
}
