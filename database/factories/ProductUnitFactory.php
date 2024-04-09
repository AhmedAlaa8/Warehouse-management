<?php

namespace Database\Factories;

use App\Http\Traits\ProductUnitTrait;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductUnit>
 */
class ProductUnitFactory extends Factory
{
    use ProductUnitTrait;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return $this->randomProductUnitData($this->faker);
    }
}
