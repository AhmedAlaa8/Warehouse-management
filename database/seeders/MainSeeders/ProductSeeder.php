<?php

namespace Database\Seeders\MainSeeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::get();
        $suppliers = Supplier::get();

        for($i = 1; $i <= 20 ; $i++)
        {
            $randomSupplier = $suppliers->random();
            $randomCategory = $categories->random();
            Product::factory()->create([
                'category_id' => $randomCategory->id,
                'supplier_id' => $randomSupplier->id,
            ]);
        }

        $this->command->info("Product Table Seeded Successfully");
    }
}
