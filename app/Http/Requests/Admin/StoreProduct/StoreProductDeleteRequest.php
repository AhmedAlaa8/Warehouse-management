<?php

namespace App\Http\Requests\Admin\StoreProduct;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductDeleteRequest extends FormRequest
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
            'id' => 'exists:store_products,id'
        ];
    }
}
