<?php

namespace App\Http\Requests\Admin\Order;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderPager extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'order_type' => 'required|in:'.getTypesInString(getOrderTypes()),
            
        ];
    }

    public function messages()
    {
        return [
            
            'order_type' => 'حدد نوع الفاتوره'

        ];
    }
}
