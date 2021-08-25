<?php

namespace App\Http\Requests\Admin\Packages;

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
            'title_ar'        => 'required' , 
            'title_en'        => 'required' , 
            'description_ar'  => 'required' , 
            'description_en'  => 'required' , 
            'image'           => 'nullable' , 
            'price'           => 'required' , 
        ];
    }
}
