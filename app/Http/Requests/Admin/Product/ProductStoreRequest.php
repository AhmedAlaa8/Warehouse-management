<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => 'required|unique:products,name',
            'published' => 'nullable|boolean',
            'desc' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'store_id' => 'required|exists:stores,id',
            'unit_id' => 'required|exists:units,id',
            'count' => 'required|numeric',
            'buy_price' => 'required_with:price|lt:price',
            'trade_price' =>'required_with:buy_price|gt:buy_price',
            'price' => 'required_with:buy_price|gt:buy_price',
            'expire_date' => 'nullable|date',
        ];
//         'min_height' => 'required_with:max_height|lt:max_height',
// 'max_height' => 'required_with:min_height|gt:min_height',
    }

    public function messages()
    {
        return [
            "name.required" => "خانة الإسم مطلوبة",
            "name.unique" => "الاسم موجود مسبقا",
            "published.required" => "خانة النشر مطلوبة",
            "published.boolean" => "خانة النشر قيمتها غير صحيحة",
            "category_id.required" => "خانة التصنيف مطلوبه",
            "category_id.exists" => "التصنيف غير موجود",
            "supplier_id.required" => "خانة المورد مطلوبه",
            "supplier_id.exists" => "المورد غير موجود",
            "unit_id.required" => "خانة الوحدة الكبيرة مطلوبة",
            "unit_id.exists" => "الوحدة الكبيرة غير موجود",
            "store_id.required" => "خانة المخزن الكبير مطلوبة",
            "store_id.exists" => "المخزن الكبير غير موجود",
            "count.required" => "الكمية مطلوبة",
            "count.numeric" => "الكمية يجب عن تكون رقم",
            "buy_price.required" => "سعر الشراء مطلوبة",
            "buy_price.numeric" => "سعر الشراء يجب عن تكون رقم",
            "trade_price.required" => "سعر الجملة مطلوبة",
            "trade_price.numeric" => "سعر الجملة يجب عن تكون رقم",
            "price.required" => "سعر القطاعي مطلوبة",
            "price.numeric" => "سعر القطاعي يجب عن تكون رقم",
            "buy_price.lt"=>"يجب ان يكون سعر الشراء اقل من البيع ",
            "price.gt" => "     سعر الشراء اقل من البيع",
            "trade_price.gt" => "     سعر الشراء اقل من الجمله",


        ];
    }
}
