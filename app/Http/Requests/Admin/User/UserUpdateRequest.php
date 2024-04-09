<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
        ];
    }


    public function messages()
    {
        return [
            "name.required" => "خانة الإسم مطلوبة",
            "phone.required" => "خانة الهاتف مطلوبة",
            "email.required" => "البريد الإلكتروني مطلوب",
            "email.email" => "البريد الإلكتروني غير صحيح",
            "email.unique" => "البريد الإلكتروني موجود مسبقا",
        ];
    }
}
