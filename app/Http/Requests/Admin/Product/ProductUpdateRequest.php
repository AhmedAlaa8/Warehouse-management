<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'published' => 'nullable|boolean',
            'desc' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "خانة الإسم مطلوبة",
            "published.required" => "خانة النشر مطلوبة",
            "published.boolean" => "خانة النشر قيمتها غير صحيحة",
            "category_id.required" => "خانة التصنيف مطلوبه",
            "category_id.exists" => "التصنيف غير موجود",
            "supplier_id.required" => "خانة المورد مطلوبه",
            "supplier_id.exists" => "المورد غير موجود",
        ];
    }
}
