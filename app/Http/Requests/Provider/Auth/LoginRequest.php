<?php

namespace App\Http\Requests\Provider\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'key'       => 'required|exists:countries,key',
            'phone'     => 'required|exists:stations,phone',
            'password'  => 'required|min:6',
        ];
    }
}
