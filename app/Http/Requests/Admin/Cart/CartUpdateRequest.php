<?php

namespace App\Http\Requests\Admin\Cart;

use Illuminate\Foundation\Http\FormRequest;

class CartUpdateRequest extends FormRequest
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
            'store_product_id' => 'required|exists:store_products,id',
            'user_id' => 'required|exists:users,id',
            'count' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            "store_product_id.required" => "خانة المنتج مطلوبة",
            "store_product_id.exists" => "المنتج غير موجود",
            "user_id.required" => "خانة المستخدم مطلوبة",
            "user_id.exists" => "المستخدم غير موجود",
            "count.required" => "الكمية مطلوبة",
            "count.numeric" => "الكمية يجب ان تكون رقم",
        ];
    }
}
