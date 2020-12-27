<?php

namespace App\Http\Requests\User;

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
            'code'       => 'max:255',
            'name'       => 'required|max:255',
            'kana'       => 'max:255',
            'postcode'   => 'max:255',
            'prefecture' => 'max:255',
            'city'       => 'max:255',
            'address1'   => 'max:255',
            'address2'   => 'max:255',
            'tel'        => 'max:255',
            'email'      => 'email|unique:t_users|max:255',
            'password'   => 'max:255',
            'birthday'   => 'date',
            'sex'        => 'integer',
        ];
    }
}
