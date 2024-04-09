<?php

namespace App\Http\Requests\Admin\Store;

use App\Rules\Admin\StoreTypesRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateRequest extends FormRequest
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
            'address' => "nullable|string",
            'type' => [
                'required',
                new StoreTypesRule()
            ],
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "خانة الإسم مطلوبة",
            "name.string" => "خانة الإسم لا بد ان تكون قيمة نصية",
            "address.string" => "العنوان لا بد ان يكون نص",
        ];
    }
}
