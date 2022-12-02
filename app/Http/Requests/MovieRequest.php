<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MovieRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->route('movie');

        return [
            'title' => [
                'required','string','min:3','max:200',
                Rule::unique('movies', 'title')->ignore($id),

            ],

            'category_id' => [
                'nullable', 'int', 'exists:categories,id'
            ],

            'image' => [
                'image', 'max:1048576', 'dimensions:min_width=100,min_height=100',
            ],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'this filed (:attribute) is required',

            'title.unique' => 'this name is already exists'

        ];
    }
}
