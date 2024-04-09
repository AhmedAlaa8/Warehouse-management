<?php

namespace App\Http\Traits;

use App\Models\Product;
use App\Models\StoreProduct;

trait ProductTrait
{
    use CategoryTrait,
    SupplierTrait;

    private function getProducts($numPerPage = null)
    {
        $query = Product::with(['category','supplier']);
        if($numPerPage)
        {
            return $query->paginate($numPerPage);
        }
        return $query->get();
    }

    public function getProductsForDataTable()
    {
        return StoreProduct::select([
            'store_products.id',
            'store_products.product_id',
            'store_products.store_id',
            'store_products.unit_id',
            'store_products.count',
            'store_products.buy_price',
            'store_products.trade_price',
            'store_products.discount',
            'store_products.price',
            'store_products.expire_date',
        ])->with([
            'product.category:id,name',
            'product.supplier:id,name',
            'unit:id,name',
            'store:id,name'
        ]);
    }

    private function getOnlyTrashedProducts($numPerPage = null)
    {
        $query = Product::onlyTrashed()->with(['category','supplier']);
        if($numPerPage)
        {
            return $query->paginate($numPerPage);
        }
        return $query->get();
    }

    private function randomProductData($faker,$moreData = null)
    {
        $data = [
            'name' => $faker->name,
            'slug' => $faker->slug,
            'published' => $faker->boolean,
            'desc' => $faker->text,
        ];
        if($moreData)
        {
            $data = array_merge($data,$moreData);
        }
        return $data;
    }

    private function createRandomProduct()
    {
        $category = $this->createRandomCategory();
        $supplier = $this->createRandomSupplier();
        return Product::factory()->create([
            'category_id' => $category->id,
            'supplier_id' => $supplier->id
        ]);
    }
}
