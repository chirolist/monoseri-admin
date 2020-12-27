<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'name'        => 'nullable|max:255',
            'code'        => 'nullable|max:255',
            'description' => 'nullable|max:255',
            'memo'        => 'nullable|max:255',
            'price_from'  => 'nullable|integer',
            'price_to'    => 'nullable|integer',
            'stock_from'  => 'nullable|integer',
            'stock_to'    => 'nullable|integer',
        ];
    }
}
