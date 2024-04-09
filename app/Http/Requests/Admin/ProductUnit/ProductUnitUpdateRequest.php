<?php

namespace App\Http\Requests\Admin\ProductUnit;

use Illuminate\Foundation\Http\FormRequest;

class ProductUnitUpdateRequest extends FormRequest
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
            'unit_id' => 'required|exists:units,id',
            'count' => 'required|numeric',
            'small_unit_id' => 'required|exists:units,id',
        ];
    }

    public function messages()
    {
        return [
            "product_id.required" => "خانة المنتج مطلوبة",
            "product_id.exists" => "المنتج غير موجود",
            "unit_id.required" => "خانة الوحدة الكبيرة مطلوبة",
            "unit_id.exists" => "الوحدة الكبيرة غير موجود",
            "count.exists" => "الكمية مطلوبة",
            "count.numeric" => "الكمية يجب عن تكون رقم",
            "small_unit_id.required" => "خانة الوحدة الصغيرة مطلوبة",
            "small_unit_id.exists" => "الوحدة الصغيرة غير موجود",
        ];
    }
}
