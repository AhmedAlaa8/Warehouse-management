<?php

namespace App\Http\Requests\Admin\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class SupplierStoreRequest extends FormRequest
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
            'phone1' => "nullable",
            'phone2' => "nullable",
            'email' => 'nullable|email',
            'company_id' => 'nullable|exists:companies,id'
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "خانة الإسم مطلوبة",
            "email.email" => "صيغة البريد الإلكتروني غير صحيحة",
            "company_id.exists" => "رقم هوية الشركة غير معروف",
        ];
    }
}
