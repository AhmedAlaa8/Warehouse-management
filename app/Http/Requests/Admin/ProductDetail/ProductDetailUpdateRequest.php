<?php

namespace App\Http\Requests\Admin\ProductDetail;

use Illuminate\Foundation\Http\FormRequest;

class ProductDetailUpdateRequest extends FormRequest
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
            'key' => 'required',
            'value' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "product_id.required" => "خانة المنتج مطلوبة",
            "product_id.exists" => "المنتج غير موجود",
            "key.required" => "الخاصية مطلوبة",
            "value.required" => "القيمة مطلوبة",
        ];
    }
}
