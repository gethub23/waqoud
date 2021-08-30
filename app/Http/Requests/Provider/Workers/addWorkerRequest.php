<?php

namespace App\Http\Requests\Provider\Workers;

use Illuminate\Foundation\Http\FormRequest;

class addWorkerRequest extends FormRequest
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
                'phone'    => 'required|min:10|unique:workers,phone,'.$this->id , 
                'identity' => 'required|unique:workers,identity,'.$this->id , 
                'name'     => 'required|min:2' , 
                'city_id'  => 'required|exists:cities,id' , 
                'key'      => 'required|exists:countries,key' , 
                'salary'   => 'required|numeric' , 
                'password' => 'nullable' , 
            ];
        }else{
            return [
                'phone'    => 'required|unique:workers,phone|min:10' , 
                'identity' => 'required|unique:workers,identity' , 
                'name'     => 'required|min:2' , 
                'city_id'  => 'required|exists:cities,id' , 
                'key'      => 'required|exists:countries,key' , 
                'salary'   => 'required|numeric' , 
                'password' => 'required' , 
            ];
        }
        
    }
}
