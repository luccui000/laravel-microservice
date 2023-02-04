<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'description' => 'nullable|max:255',
            'long_description' => 'nullable|max:1000',
            'is_hot' => 'required',
            'is_new' => 'required',
            'is_unlimited' => 'required',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'colors.*' => 'exists:colors,name',
            'sizes' => 'exists:sizes,name',
            'image' => 'required',
            'has_variant' => 'required',
            'price' => 'nullable|numeric|min:0|max:9999999999',
            'sell_price' => 'nullable|numeric|min:0|max:99999999',
            'tags' => 'exists:tags,name',
        ];
    }
}
