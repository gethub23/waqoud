<?php

namespace App\Http\Requests\Provider\Accounts;

use Illuminate\Foundation\Http\FormRequest;

class addAccountRequest extends FormRequest
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
            'account_name'     => 'required' , 
            'account_number'   => 'required' , 
            'bank_id'          => 'required|exists:banks,id' , 
            'iban'             => 'required|unique:station_accounts,iban' , 
        ];
    }
}
