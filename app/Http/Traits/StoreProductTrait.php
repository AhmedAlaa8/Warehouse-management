<?php

namespace App\Http\Traits;

use App\Models\StoreProduct;

trait StoreProductTrait
{
    private function getStoreProducts($numPerPage = null)
    {
        $query = StoreProduct::with(['product','unit','store']);
        if($numPerPage)
        {
            return $query->paginate($numPerPage);
        }
        return $query->get();
    }

    private function getOnlyTrashedStoreProducts($numPerPage = null)
    {
        $query = StoreProduct::onlyTrashed()->with(['product','unit','store']);
        if($numPerPage)
        {
            return $query->paginate($numPerPage);
        }
        return $query->get();
    }

    private function randomStoreProductData($faker,$moreData = null)
    {
        $data = [
            'count' => $faker->randomFloat(2,10,500),
            'buy_price' => $faker->randomFloat(2,10,500),
            'trade_price' => $faker->randomFloat(2,10,500),
            'price' => $faker->randomFloat(2,10,500),
            'expire_date' => $faker->date(),
        ];
        if($moreData)
        {
            $data = array_merge($data,$moreData);
        }
        return $data;
    }
}
