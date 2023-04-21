<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

 
    public function rules()
    {
        return [
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed',
            'surname'=>'nullable|string',
            'patronymic'=>'nullable|string',
            'age'=>'nullable|integer',
            'address'=>'nullable|string',
            'gender'=>'nullable|integer',
        ];
    }
}
