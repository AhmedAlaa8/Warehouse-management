<?php

namespace App\Http\Traits;

use App\Models\Category;

trait CategoryTrait
{
    private function getCategories($numPerPage = null)
    {
        $query = Category::query();
        if($numPerPage)
        {
            return $query->paginate($numPerPage);
        }
        return $query->get();
    }

    private function randomCategoryData($faker)
    {
        return [
            'name' => $faker->name(),
            'parent_id' => rand(0,9)
        ];
    }

    private function createRandomCategory()
    {
        return Category::factory()->create();
    }
}
