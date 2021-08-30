<?php

namespace App\Http\Requests\Provider\Settings;

use Illuminate\Foundation\Http\FormRequest;

class updateSettingsRequest extends FormRequest
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
            'avatar'        => 'nullable|image' , 
            'name'          => 'required|string' , 
            'phone'         => 'required|numeric|unique:stations,phone,'.auth('station')->id() , 
            'key'           => 'required|exists:countries,key' , 
            'boss_key'      => 'required|exists:countries,key' , 
            'email'         => 'required|email|unique:stations,email,'.auth('station')->id() , 
            'password'      => 'nullable' , 
            'city_id'       => 'required|exists:cities,id' , 
            'address'       => 'required|string' , 
            'latitude'      => 'required' , 
            'longitude'     => 'required' , 
            'boss_avatar'   => 'nullable|image' , 
            'boss_name'     => 'required|string' , 
            'boss_phone'    => 'required|numeric|unique:stations,boss_phone,'.auth('station')->id() , 
            'boss_identity' => 'required' , 
        ];
    }
}
