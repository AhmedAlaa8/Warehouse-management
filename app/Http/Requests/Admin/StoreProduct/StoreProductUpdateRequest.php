<?php

namespace App\Http\Requests\Admin\StoreProduct;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductUpdateRequest extends FormRequest
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
            'store_id' => 'required|exists:stores,id',
            'unit_id' => 'required|exists:units,id',
            'count' => 'required|numeric',
            'buy_price' => 'required|numeric',
            'trade_price' => 'required|numeric',
            'price' => 'required|numeric',
            'expire_date' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            "product_id.required" => "خانة المنتج مطلوبة",
            "product_id.exists" => "المنتج غير موجود",
            "unit_id.required" => "خانة الوحدة الكبيرة مطلوبة",
            "unit_id.exists" => "الوحدة الكبيرة غير موجود",
            "store_id.required" => "خانة المخزن الكبيرة مطلوبة",
            "store_id.exists" => "المخزن الكبيرة غير موجود",
            "count.required" => "الكمية مطلوبة",
            "count.numeric" => "الكمية يجب عن تكون رقم",
            "buy_price.required" => "سعر الشراء مطلوبة",
            "buy_price.numeric" => "سعر الشراء يجب عن تكون رقم",
            "trade_price.required" => "سعر الجملة مطلوبة",
            "trade_price.numeric" => "سعر الجملة يجب عن تكون رقم",
            "price.required" => "سعر القطاعي مطلوبة",
            "price.numeric" => "سعر القطاعي يجب عن تكون رقم",
        ];
    }
}
