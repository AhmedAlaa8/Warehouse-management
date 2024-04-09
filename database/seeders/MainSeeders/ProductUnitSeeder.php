<?php

namespace Database\Seeders\MainSeeders;

use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::get();
        $units = Unit::get();

        foreach($products as $product)
        {
            $unit = $units->random(2);
            ProductUnit::factory(3)->create([
                'product_id' => $product->id,
                'unit_id' => $unit->slice(0,1)->first()->id,
                'small_unit_id' => $unit->slice(1,1)->first()->id,
            ]);
        }

        $this->command->info("Product Unit Table Seeded Successfully");
    }
}
