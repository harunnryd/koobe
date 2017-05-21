<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
        $rules = [
            'title' => 'required|unique:books',
            'author' => 'required',
            'photo' => 'sometimes|max:1024|mimes:jpeg,png,jpg',
            'desc' => 'sometimes|max:255',
            'stock' => 'integer|min:1',
            'page' => 'integer|between:1,10000',
            'price' => 'sometimes|string',
        ];  

        if ($this->isMethod('patch')) {
            $rules['title'] = 'required|unique:books,id,'. $this->get('id');
        }   return $rules;
    }
}
