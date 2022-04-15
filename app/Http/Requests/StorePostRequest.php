<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'=>['required','min:3',"unique:posts,title"],
            'descreption'=>['required','min:5'],
            'creator'=>['required','exists:users,id']
        ];
    }
    public function messages()
{
    return [
        'title.required'=>"title missing ",
         'title.min'=>"title should more than 3 char"
    ];
}
}
