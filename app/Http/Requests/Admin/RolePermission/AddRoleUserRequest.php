<?php

namespace App\Http\Requests\Admin\RolePermission;

use Illuminate\Foundation\Http\FormRequest;

class AddRoleUserRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ];
    }

    public function messages()
    {
        return [
            "user_id.required" => "خانة المستخدم مطلوبة",
            "user_id.exists" => "المستخدم غير موجود",
            "role_id.required" => "خانة الدور مطلوبة",
            "role_id.exists" => "الدور غير موجود",
        ];
    }
}
