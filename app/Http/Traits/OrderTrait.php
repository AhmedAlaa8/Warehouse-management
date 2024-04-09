<?php

namespace App\Http\Traits;

use App\Models\Order;

trait OrderTrait
{
    private function getOrders($numPerPage = null)
    {
        $query = Order::query();
        if ($numPerPage) {
            return $query->paginate($numPerPage);
        }
        return $query->get();
    }
}
