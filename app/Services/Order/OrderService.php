<?php

namespace App\Services\Order;

use App\Http\Traits\CartTrait;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderService
{
    use CartTrait;

    private $cartablesArray;

    public function run($payload)
    {
        $data = $payload['data'];
        $methodeName = $payload['type'];

        return $this->createOrder($data,$methodeName);
    }

    public function createOrder($data,$callback)
    {
        $this->cartablesArray = $this->getCartablesFromSelect($data['user_id']);
        $userCart = $this->cartablesArray['query']->get();
        $orderTotal = $this->getSumOfTotalOfCarts($userCart);
        $total_products_buy_price = $this->getSumOfProductsBuyPrice($userCart);
        
        $discount = $data['discount'] ?? 0;
        $total_after_discount = $orderTotal - $discount;
        $paid = $data['paid'] ?? 0;
        $left = $total_after_discount - $paid;

        $order = Order::create([
            'orderable_id' => $this->cartablesArray['cartableModel']->id,
            'orderable_type' => $this->cartablesArray['cartableModel']::class,
            'date' => now(),
            'discount' => $discount,
            'total_products_buy_price' => $total_products_buy_price,
            'total' => $orderTotal,
            'total_after_discount' => $total_after_discount,
            'paid' => $paid,
            'left' => $left,
            'status' => 'open',
            'type' => $data['order_type']
        ]);

        if(method_exists($this,$callback))
        {
            $this->$callback($order);
        }
    }

    private function buy($order)
    {
        $cartQuery = $this->cartablesArray['query'];

        foreach ($cartQuery->get() as $cartItem) {
            $orderDetail = OrderDetail::create([
                'order_id' => $order->id,
                'store_product_id' => $cartItem->store_product_id,
                'count' => $cartItem->count,
                'product_buy_price' => $cartItem->product_buy_price,
                'discount' => $cartItem->discount,
                'price' => $cartItem->price,
                'total' => $cartItem->total_price
            ]);
            
            $buy_price = round((($orderDetail->price + $orderDetail->storeProduct->buy_price) / 2),2);

            $orderDetail->storeProduct()->update([
                'count' => $orderDetail->storeProduct->count + $orderDetail->count,
                'buy_price' => $buy_price 
            ]);
        }

        $cartableModel = $this->cartablesArray['cartableModel'];

        $cartableModel->profile()->update([
            'credit' => $cartableModel->profile->credit - $order->left,
        ]);

        $cartQuery->delete();
    }

    private function sell($order)
    {
        $cartQuery = $this->cartablesArray['query'];

        foreach ($cartQuery->get() as $cartItem) {
            $orderDetail = OrderDetail::create([
                'order_id' => $order->id,
                'store_product_id' => $cartItem->store_product_id,
                'count' => $cartItem->count,
                'product_buy_price' => $cartItem->product_buy_price,
                'discount' => $cartItem->discount,
                'price' => $cartItem->price,
                'total' => $cartItem->total_price
            ]);

            $orderDetail->storeProduct()->update([
                'count' => $orderDetail->storeProduct->count - $orderDetail->count,
            ]);
        }

        $cartableModel = $this->cartablesArray['cartableModel'];

        $cartableModel->profile()->update([
            'credit' => $cartableModel->profile->credit + $order->left,
            'total_paid' => $cartableModel->profile->total_paid + $order->paid,
            'total_earned' => $order->total_after_discount - $order->total_products_buy_price
        ]);

        $cartQuery->delete();
    }

    private function return()
    {
        dd("return function");
    }
}