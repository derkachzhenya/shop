<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title'=>'required|string',

            'description'=>'required',
            'content'=>'required',
            'preview_image'=>'required',
            'price'=>'required',
            'count'=>'required',
            'is_published'=>'nullable',
            'category_id'=>'nullable',
            'tags'=>'nullable|array',
            'colors'=>'nullable|array',
        ];
    }
}
