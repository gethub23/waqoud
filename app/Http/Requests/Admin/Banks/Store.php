<?php

namespace App\Http\Requests\Admin\Banks;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'icon'          => 'nullable|image' , 
            'name_ar'       => 'required' , 
            'name_en'       => 'required' , 
            'iban'          => 'required' , 
            'account_name'  => 'required' , 
            'account_number'=> 'required' , 
        ];
    }
}
