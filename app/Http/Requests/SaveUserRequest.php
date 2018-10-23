<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->students)
        {
            if($this->user()->isAdmin()) return true;

            return Post::where('id', $this->blog)
                       ->where('user_id', $this->user()->id)->exists();
        }

        return true;

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required',
            'lastname'  => 'required',
            'email' => 'required|email',
        ];
    }
}
