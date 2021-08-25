<?php

namespace App\Http\Requests\Api\Messages;

use App\Traits\Responses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class sendMessageRequest extends FormRequest
{
    use Responses ;
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
            'user_name'  => 'required' , 
            'phone'      => 'required' , 
            'key'        => 'required' , 
            'message'    => 'required' , 
        ];
    }

    
    protected function failedValidation(Validator $validator)
    {
        $this->validationResponse($validator);
    }
}
