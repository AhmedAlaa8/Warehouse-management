<?php

namespace App\Http\Traits;

use App\Models\Store;

trait StoreTrait
{
    private function getStores($numPerPage = null)
    {
        $query = Store::query();
        if($numPerPage)
        {
            return $query->paginate($numPerPage);
        }
        return $query->get();
    }

    private function randomStoreData($faker)
    {
        return [
            'name' => $faker->name(),
            'address' => $faker->address,
            'type' => array_keys(getStoreTypes())[array_rand(array_keys(getStoreTypes()))]
        ];
    }

    private function createRandomStore()
    {
        return Store::factory()->create();
    }
}
