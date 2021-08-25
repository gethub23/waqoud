<?php

namespace App\Http\Requests\Admin\Stations;

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
        if($this->getMethod() === 'PUT'){
            return [
                'avatar'        => 'image|nullable' , 
                'boss_avatar'   => 'image|nullable' , 
                'name'          => 'required' , 
                'phone'         => 'required|numeric|unique:stations,phone,'.$this->id , 
                'email'         => 'required|email|unique:stations,email,'.$this->id , 
                'password'      => 'required' , 
                'city_id'       => 'required|exists:cities,id' , 
                'active'        => 'required|in:1,0' , 
                'block'         => 'required|in:1,0' , 
                'boss_name'     => 'required' , 
                'boss_phone'    => 'required|unique:stations,boss_phone,'.$this->id , 
                'boss_identity' => 'required' , 
                'latitude'      => 'required' , 
                'longitude'     => 'required' , 
            ];
        }else{
            return [
                'avatar'        => 'image|required' , 
                'boss_avatar'   => 'image|required' , 
                'name'          => 'required' , 
                'phone'         => 'required|numeric|unique:stations,phone' , 
                'email'         => 'required|email|unique:stations,email' , 
                'password'      => 'required' , 
                'city_id'       => 'required|exists:cities,id' , 
                'active'        => 'required|in:1,0' , 
                'block'         => 'required|in:1,0' , 
                'boss_name'     => 'required' , 
                'boss_phone'    => 'required|unique:stations,boss_phone' , 
                'boss_identity' => 'required' , 
                'latitude'      => 'required' , 
                'longitude'     => 'required' , 
            ];
        }
    }
}
