<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        $id = $this->route('category');

        return [
            'title' => [
                'required','string','min:3','max:200',
                Rule::unique('categories', 'title')->ignore($id),

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
