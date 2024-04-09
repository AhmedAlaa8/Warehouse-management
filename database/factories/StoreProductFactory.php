<?php

namespace Database\Factories;

use App\Http\Traits\StoreProductTrait;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StoreProduct>
 */
class StoreProductFactory extends Factory
{
    use StoreProductTrait;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return $this->randomStoreProductData($this->faker);
    }
}
