<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateColorRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
        return [
            'title' => ['required', 'regex:/^([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
           
        ];
    }
}
