<?php

namespace App\Observers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderObserver
{

    private Cart $cartModel;

    public function __construct(Cart $cart)
    {
        $this->cartModel = $cart;
    }
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        // $cartQuery = $this->cartModel::where('user_id', $order->user_id);

        // foreach ($cartQuery->get() as $cartItem) {
        //     OrderDetail::create([
        //         'order_id' => $order->id,
        //         'store_product_id' => $cartItem->store_product_id,
        //         'count' => $cartItem->count,
        //         'price' => $cartItem->price,
        //         'total' => $cartItem->total_price
        //     ]);
        // }

        // $cartQuery->delete();
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
