<?php

namespace Database\Seeders\MainSeeders;

use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::get();

        foreach($products as $product)
        {
            ProductDetail::factory(3)->create([
                'product_id' => $product->id,
            ]);
        }

        $this->command->info("Product Detail Table Seeded Successfully");
    }
}
