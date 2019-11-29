<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookCreateRequest extends FormRequest
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
            'name'=>'required|string|max:255|unique:books',
            'discriptions' => 'required|string|max:255',
            'excerpts' => 'required|string|max:255',
            'pubic_years' => 'required|string|max:255',
            'status' => 'bool|max:1',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }
}
