<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveLessonRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'date'      => 'required|date_format:d/m/Y',
            'time_from' => 'required',
            'time_to'   => 'required',
            'price'     => 'numeric',
            'paid'      => 'required',
        ];
    }
}
