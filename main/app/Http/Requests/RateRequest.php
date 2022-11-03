<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'vote' => 'required|numeric|min:1|max:5',
        ];
    }
}
