<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductPostRequest extends FormRequest
{
   
    public function rules(Request $request)
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
        ];
    }

    
    public function authorize()
    {
        return true;
    }
}
