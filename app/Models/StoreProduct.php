<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreProduct extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'product_id',
        'store_id',
        'unit_id',
        'count',
        'buy_price',
        'discount',
        'trade_price',
        'price',
        'expire_date'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class,'store_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id');
    }
}
