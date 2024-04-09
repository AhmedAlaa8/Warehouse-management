<?php

namespace App\Http\Requests\Admin\UserProfile;

use App\Rules\Admin\UserTypeRule;
use Illuminate\Foundation\Http\FormRequest;

class UserProfilStoreRequest extends FormRequest
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
            'phone1' => 'required',
            'phone2' => 'nullable',
            'home_phone' => 'nullable',
            'address' => 'nullable',
            'job' => 'nullable',
            'type' => [
                'required',
                new UserTypeRule()
            ],
            'credit' => 'nullable|numeric',
            'total_paid' => 'nullable|numeric',
            'total_earned' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            "user_id.required" => "يجب تحديد مستخدم",
            "user_id.exists" => " المستخدم غير موجود",
        ];
    }
}
