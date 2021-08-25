<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\Responses;
use Illuminate\Contracts\Validation\Validator;

class EditProfileRequest extends FormRequest
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
            'name'           => 'required',
            // 'key'            => 'required|exists:countries,key' , 
            // 'phone'          => 'required|min:10|unique:users,phone',
            'identity'       => 'required|min:10|unique:users,identity',
            'gender'         => 'required|in:male,female', 
            'address'        => 'required',
            'latitude'       => 'required',
            'longitude'      => 'required',
            'birthdate'      => 'required',
            'avatar'         => 'nullable',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validationResponse($validator);
    }
}
