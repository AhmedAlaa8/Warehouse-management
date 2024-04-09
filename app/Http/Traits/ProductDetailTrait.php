<?php

namespace App\Http\Traits;

use App\Models\ProductDetail;

trait ProductDetailTrait
{
    private function getProductDetail($numPerPage = null)
    {
        $query = ProductDetail::with(['product']);
        if($numPerPage)
        {
            return $query->paginate($numPerPage);
        }
        return $query->get();
    }

    private function getOnlyTrashedProductDetail($numPerPage = null)
    {
        $query = ProductDetail::onlyTrashed()->with(['product']);
        if($numPerPage)
        {
            return $query->paginate($numPerPage);
        }
        return $query->get();
    }

    private function randomProductDetailData($faker,$moreData = null)
    {
        $data = [
            'key' => $faker->name,
            'value' => $faker->text,
        ];
        if($moreData)
        {
            $data = array_merge($data,$moreData);
        }
        return $data;
    }
}
