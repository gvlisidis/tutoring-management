<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveStudentRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name'     => 'required',
            'lastname' => 'required',
            'address'  => 'min:5',
            'email'    => 'email',
        ];
    }
}
