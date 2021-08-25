<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\Responses;
use Illuminate\Contracts\Validation\Validator;


class EditPasswordRequest extends FormRequest
{

    use Responses;
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
            'old_password'    => 'required|min:6',
            'password'        => 'required|min:6'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validationResponse($validator);
    }
}
