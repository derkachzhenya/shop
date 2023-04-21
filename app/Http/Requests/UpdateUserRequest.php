<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>'required|string',
            'surname'=>'nullable|string',
            'patronymic'=>'nullable|string',
            'age'=>'nullable|integer',
            'address'=>'nullable|string',
            'gender'=>'nullable|integer',
        ];
    }
}
