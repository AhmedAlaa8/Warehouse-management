<?php

namespace Database\Factories;

use App\Http\Traits\ProductDetailTrait;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductDetail>
 */
class ProductDetailFactory extends Factory
{
    use ProductDetailTrait;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return $this->randomProductDetailData($this->faker);
    }
}
