<?php

namespace Database\Seeders\MainSeeders;

use App\Models\Product;
use App\Models\Store;
use App\Models\StoreProduct;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreProductSeeder extends Seeder
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
        $stores = Store::get();

        foreach($products as $product)
        {
            $unit = $units->random();
            $store = $stores->random();
            StoreProduct::factory(3)->create([
                'product_id' => $product->id,
                'unit_id' => $unit->id,
                'store_id' => $store->id,
            ]);
        }

        $this->command->info("Product Store Table Seeded Successfully");
    }
}
