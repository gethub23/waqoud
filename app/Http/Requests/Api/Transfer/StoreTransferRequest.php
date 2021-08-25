<?php

namespace App\Http\Requests\Api\Transfer;

use App\Traits\Responses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StoreTransferRequest extends FormRequest
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
            'image'          => 'required' , 
            'phone'          => 'required' , 
            'bank_id'        => 'required|exists:banks,id' , 
            'user_name'      => 'required|min:3' , 
            'bank_from_name' => 'required' , 
            'type'           => 'required|in:charge,year' , 
            'package_id'     => 'required_if:type,charge|exists:packages,id' , 
            'amount'         => 'required' , 
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validationResponse($validator);
    }
}
