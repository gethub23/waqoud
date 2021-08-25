<?php

namespace App\Http\Requests\Api\Orders;

use App\Traits\Responses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class newOrderRequest extends FormRequest
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
            'liters'         => 'required|min:1' , 
            'fuel_id'        => 'required|exists:fuels,id' , 
            'user_id'        => 'required|exists:users,id' , 
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validationResponse($validator);
    }
}
