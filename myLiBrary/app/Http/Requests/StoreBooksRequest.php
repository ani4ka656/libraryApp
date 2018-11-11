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
            'book_path' => 'required|mimes:txt',

        ];
    }
    public function messages(){
        return [
            'name.required'=>'Полето за името е задължително.',
            'author_id.required'=>'Полето за автора е задължително.',
            'total_number_of_pages.required'=>'Полето origin е задължително.',
            'book_path.required'=>'Полето book_path е задължително.',
            'name.min'=>'Името трябва да е повече от 3 знака.',
            'name.mimes'=>'Файлът трябва да е повече от .txt или .doc формат.',
       ];
    }
}
