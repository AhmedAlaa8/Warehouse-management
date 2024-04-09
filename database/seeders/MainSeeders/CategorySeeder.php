<?php

namespace Database\Seeders\MainSeeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(5)->create()->each(function (Category $category){
            Category::factory(5)->create(['parent_id' => $category->id])->each(function (Category $category){
                Category::factory(5)->create(['parent_id' => $category->id]);
            });
        });

        $this->command->info("Category Table Seeded Successfully");
    }
}
