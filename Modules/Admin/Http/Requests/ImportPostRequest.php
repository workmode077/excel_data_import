<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ImportPostRequest extends FormRequest
{
    public function rules(Request $request)
    {
        return [
          'file' => 'required|file|mimes:xlsx,xls,csv', 
        ];
    }
    public function authorize()
    {
        return true;
    }
}
