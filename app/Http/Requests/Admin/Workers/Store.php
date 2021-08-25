<?php

namespace App\Http\Requests\Admin\Workers;

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
                'name'          => 'required' , 
                'identity'      => 'required|unique:workers,identity,'.$this->id ,
                'phone'         => 'required|numeric|unique:workers,phone,'.$this->id , 
                'salary'        => 'required|numeric', 
                'password'      => 'required', 
                'city_id'       => 'required|exists:cities,id' , 
                'station_id'    => 'required|exists:stations,id' , 
            ];
        }else{
            return [
                'avatar'        => 'image|required' , 
                'name'          => 'required' , 
                'identity'      => 'required|unique:workers,identity,'.$this->id ,
                'phone'         => 'required|numeric|unique:workers,phone,'.$this->id , 
                'salary'        => 'required|numeric', 
                'password'      => 'required', 
                'city_id'       => 'required|exists:cities,id' , 
                'station_id'    => 'required|exists:stations,id' ,
            ];
        }
    }
}
