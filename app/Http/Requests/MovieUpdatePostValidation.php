<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieUpdatePostValidation extends FormRequest
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
            'title'   => 'required|unique:movies,title,'.$this->movie->id,
            'year'    => 'required|integer|min:1900|max:'.date('Y'),
            'imdb_id' => 'required|unique:movies,imdb_id,'.$this->movie->id,
            'image'   => 'sometimes|dimensions:max_width=1024'
        ];
    }
}
