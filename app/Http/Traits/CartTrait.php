<?php

namespace App\Http\Traits;

use App\Models\Cart;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

trait CartTrait
{
    private function getCarts($numPerPage = null)
    {
        $query = Cart::with(['storeProduct.product','storeProduct.unit','cartable']);
        if($numPerPage)
        {
            return $query->paginate($numPerPage);
        }
        return $query->get();
    }

    private function getOnlyTrashedCarts($numPerPage = null)
    {
        $query = Cart::onlyTrashed()->with(['storeProduct','user']);
        if($numPerPage)
        {
            return $query->paginate($numPerPage);
        }
        return $query->get();
    }

    public function getSumOfTotalOfCarts(Collection $cart)
    {
        return $cart->sum(function($item){
            return $item->total_price;
        });
    }

    public function getSumOfTotalOfDiscount(Collection $cart)
    {
        return $cart->sum(function($item){
            return $item->discount;
        });
    }

    public function getSumOfProductsBuyPrice(Collection $carts)
    {
        return $carts->sum(function($item){
            return $item->product_buy_price * $item->count;
        });
    }

    private function getCartablesFromSelect($userId)
    {
        $userArray = explode('-',$userId);
        $cartableType = array_pop($userArray);
        $userId = array_pop($userArray);

        $data = [];
        if($cartableType == "مورد")
        {
            $data['query'] = Cart::whereHasMorph('cartable',[Supplier::class],function($query) use ($userId){
                return $query->where('cartable_id',$userId);
            });
            $data['cartableModel'] = Supplier::find($userId);
        }
        else if($cartableType == "مستخدم")
        {
            $data['query'] = Cart::whereHasMorph('cartable',[User::class],function($query) use ($userId){
                return $query->where('cartable_id',$userId);
            });
            $data['cartableModel'] = User::find($userId);
        }
        return $data;
    }
}
