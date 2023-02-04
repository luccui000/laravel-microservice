<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponStoreRequest extends FormRequest
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
            'name' => 'required',
            'code' => 'required|max:30|unique:coupons,code',
            'from' => 'nullable|date',
            'to' => 'nullable|date',
            'discount_after' => '',
            'discount_type' => 'required',
            'discount_value' => 'required',
            'is_specify_product' => 'required|in:1,2',
            'status' => 'required|in:1,2',
        ];
    }
}
