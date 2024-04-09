<?php

namespace App\Http\Traits;

use App\Models\ProductUnit;

trait ProductUnitTrait
{
    use ProductTrait,
    UnitTrait;

    private function getProductUnits($numPerPage = null)
    {
        $query = ProductUnit::with(['product','unit','smallUnit']);
        if($numPerPage)
        {
            return $query->paginate($numPerPage);
        }
        return $query->get();
    }

    private function getOnlyTrashedProductUnits($numPerPage = null)
    {
        $query = ProductUnit::onlyTrashed()->with(['product','unit','smallUnit']);
        if($numPerPage)
        {
            return $query->paginate($numPerPage);
        }
        return $query->get();
    }

    private function randomProductUnitData($faker,$moreData = null)
    {
        $data = [
            'count' => $faker->randomFloat(2,5,200),
        ];
        if($moreData)
        {
            $data = array_merge($data,$moreData);
        }
        return $data;
    }

    private function createRandomProductUnit()
    {
        $product = $this->createRandomProduct();
        $unit = $this->createRandomUnit();
        $small_unit = $this->createRandomUnit();
        return ProductUnit::factory()->create([
            'product_id' => $product->id,
            'unit_id' => $unit->id,
            'small_unit_id' => $small_unit->id
        ]);
    }
}
