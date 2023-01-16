<?php

namespace App\Http\Requests\FE;

use Illuminate\Foundation\Http\FormRequest;

class AddToCartProductRequest extends FormRequest
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
            'product_id' => 'required|exists:products,id',
            'sku_id' => 'required|exists:skus,id',
            'quantity' => 'required|numeric|min:1|max:1000'
        ];
    }
}
