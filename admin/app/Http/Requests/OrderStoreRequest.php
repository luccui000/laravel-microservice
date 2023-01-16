<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
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
            'sub_total' => 'required|numeric',
            'discount' => 'required|numeric',
            'customer_id' => 'required|exists:customers,id',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.sku_id' => 'required|exists:skus,id',
            'items.*.quantity' => 'required|min:1|max:1000',
        ];
    }
}
