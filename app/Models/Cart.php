<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'cartable_id',
        'cartable_type',
        'store_product_id',
        'product_buy_price',
        'discount',
        'count',
        'price',
        'total_price'
    ];

    public function storeProduct()
    {
        return $this->belongsTo(StoreProduct::class,'store_product_id');
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class,'user_id');
    // }
    public function cartable()
    {
        return $this->morphTo();
    }
}
