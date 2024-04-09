<?php

namespace App\Http\Requests\Admin\ProductUnit;

use Illuminate\Foundation\Http\FormRequest;

class ProductUnitDeleteRequest extends FormRequest
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
            'id' => 'exists:product_units,id'
        ];
    }
}
