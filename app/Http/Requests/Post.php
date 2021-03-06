<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Post extends FormRequest
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
            'category_id' => 'required',
            'title' => ['required', 'unique:posts', 'max:255'],
            'body' => 'required',
        ];
    }

    public function withValidator($validator){
        $validator->after(function ($validator) {
            if ($this->rules()) {
                $validator->errors()->add('field', 'Something is wrong with this field!');
            }
        });
    }

    public function messages()
    {
        return [
            'title.required' => 'The :attribute field can not be blank value',
        ];
    }
}
