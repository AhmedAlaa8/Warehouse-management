<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'order_id',
        'store_product_id',
        'product_buy_price',
        'discount',
        'count',
        'price',
        'total'
    ];

    public function storeProduct()
    {
        return $this->belongsTo(StoreProduct::class, 'store_product_id');
    }
}
