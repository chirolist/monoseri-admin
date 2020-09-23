<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'code'        => 'required|max:255',
            'name'        => 'required|max:255',
            'description' => 'required',
            'price'       => 'required|integer',
            'stock'       => 'nullable|integer',
            'memo'        => 'max:255',
            'image'       => 'array',
            'image.*'     => 'file|image|max:1024|mimes:jpg,jpeg,png|nullable'
        ];
    }
}
