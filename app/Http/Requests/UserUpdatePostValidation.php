<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdatePostValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'firstname' => 'sometimes|max:255',
            'lastname'  => 'sometimes|max:255',
            'email'     => 'sometimes|email|unique:users,email,'.$this->user()->id,
            'birthdate' => 'sometimes',
            'user_type' => 'sometimes',
        ];
    }
}
