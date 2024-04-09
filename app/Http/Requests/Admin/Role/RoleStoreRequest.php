<?php

namespace App\Http\Requests\Admin\Role;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
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
            'name' => 'required|unique:roles,name,except,id',
            'display_name' => 'nullable',
            'description' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "خانة الإسم مطلوبة",
            "name.unique" => "الدور موجود مسبقا",
        ];
    }
}
