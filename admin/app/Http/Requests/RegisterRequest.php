<?php

namespace App\Http\Requests;

use App\Rules\PhonerRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'first_name'=> 'required|max:255',
            'last_name' => 'required|max:255',
            'phone'     => [
                'required',
                'unique:customers,phone',
                new PhonerRule()
            ],
            'email'     => 'nullable|email|unique:customers,email',
            'password'  => [
                'required',
                'string',
                'min:8',
                'max:50',
                'regex:/[a-z]/',                    // must contain at least one lowercase letter
                'regex:/[A-Z]/',                    // must contain at least one uppercase letter
                'regex:/[0-9]/',                    // must contain at least one digit
                'regex:/[@!;#$%&)(^:,.~*<>?-]/',    // must contain a special character
                'not_regex:/[^a-zA-Z0-9@!;#$%&)(^:,.~*<>?-]/',
            ]
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Vui lòng nhập vào họ',
            'last_name.required' => 'Vui lòng nhập vào tên',
            'phone.required' => 'Vui lòng nhập vào số điện thoại',
            'phone.unique' => 'Số điện thoại đã được đăng ký',
            'email.unique' => 'Email đã được đăng ký',
            'password.required' => 'Vui lòng nhập vào mật khẩu',
            'password.regex' => 'Mật khẩu không hợp lệ, phải dài từ 8 - 50 ký tự, có chữ cái hoa, thường và ký tự đặc biệt',
            'password.min' => 'Mật khẩu không hợp lệ, phải dài từ 8 - 50 ký tự, có chữ cái hoa, thường và ký tự đặc biệt',
            'password.max' => 'Mật khẩu không hợp lệ, phải dài từ 8 - 50 ký tự, có chữ cái hoa, thường và ký tự đặc biệt',
        ];
    }
}
