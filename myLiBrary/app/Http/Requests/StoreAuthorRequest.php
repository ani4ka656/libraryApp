<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorRequest extends FormRequest
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
            'birth_date' => 'required',
            'origin' => 'required|max:20',
            'biography' => 'required|max:500',
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Полето за името е задължително',
            'birth_date.required'=>'Полето за рожденната дата е задължително',
            'origin.required'=>'Полето origin е задължително',
            'biography.required'=>'Полето за биографията е задължително',
            'origin.max'=>'Не повече от 500 знака за полето за произхода.',
            'biography.max'=>'Не повече от 500 знака за полето за биографията.',
            'name.min'=>'Името трябва да е повече от 3 знака.',
       ];
    }
}
