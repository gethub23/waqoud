<?php

namespace App\Http\Requests\Admin\Client;

use Illuminate\Foundation\Http\FormRequest;

class AddEditClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if($this->getMethod() === 'PUT'){
            $rules = [
                'name'                  => 'required|max:191',
                'phone'                 => 'required|numeric|unique:users,phone,'.$this->id,
                'birthdate'             => 'required|date',
                'email'                 => 'required|email|max:191|unique:users,email,'.$this->id,
                'subscribed'            => 'required|in:1,0',
                'subscribe_end'         => 'required|date',
                'block'                 => 'required|in:1,0',
                'gender'                => 'required|in:male,female',
                'latitude'              => 'required',
                'longitude'             => 'required',
                'address'               => 'required',
                'identity'              => 'required|unique:users,identity,'.$this->id,
                'password'              => ['required','max:191'],
                'avatar'                => ['nullable','image'],
            ];
            return $rules;
        }else{
            $rules = [
                'name'                  => 'required|max:191',
                'phone'                 => 'required|numeric|unique:users,phone',
                'birthdate'             => 'required|date',
                'email'                 => 'required|email|max:191|unique:users,email',
                'subscribed'            => 'required|in:1,0',
                'subscribe_end'         => 'required|date',
                'block'                 => 'required|in:1,0',
                'gender'                => 'required|in:male,female',
                'latitude'              => 'required',
                'longitude'             => 'required',
                'address'               => 'required',
                'identity'              => 'required|unique:users,identity',
                'password'              => ['required','max:191'],
                'avatar'                => ['nullable','image'],
            ];
            return $rules;
        }
    }
}
