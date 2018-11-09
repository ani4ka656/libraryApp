<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBooksRequest extends FormRequest
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
            'name' => 'required|min:3',
            'author_id' => 'required',
            'total_number_of_pages' => 'required|numeric',

        ];
    }
    public function messages(){
        return [
            'name.required'=>'Полето за името е задължително',
            'author_id.required'=>'Полето за автора е задължително',
            'total_number_of_pages.required'=>'Полето origin е задължително',
            'name.min'=>'Името трябва да е повече от 3 знака.',
       ];
    }
}
