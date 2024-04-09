<?php

namespace App\Http\Requests\Admin\Cart;

use App\Rules\Cart\DiscountPositiveRule;
use App\Rules\Cart\PositiveRule;
use Illuminate\Foundation\Http\FormRequest;

class CartStoreRequest extends FormRequest
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
            'storeProducts' => 'required|array',
            'storeProducts.*' => 'exists:store_products,id',
            'counts' => [
                'required',
                'array',
                new PositiveRule()
            ],
            'prices' => [
                'required',
                'array',
                new PositiveRule()
            ],
            'discounts' => [
                'required',
                'array',
                new DiscountPositiveRule()
            ],
            'total_prices' => [
                'required',
                'array',
            ],
        ];
    }
}
