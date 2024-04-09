<?php

namespace App\Http\Requests\Admin\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
            'name' => "required|string",
            'phone1' => "nullable",
            'phone2' => "nullable",
            'address' => "nullable|string",
            'manager_name' => "nullable|string",
            'manager_phone' => "nullable",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "خانة الإسم مطلوبة",
            "name.string" => "خانة الإسم لا بد ان تكون قيمة نصية",
            "address.string" => "العنوان لا بد ان يكون نص",
            "manager_name.string" => "اسم المدير لا بد ان يكون نص",
        ];
    }
}
