<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'orderable_type',
        'orderable_id',
        'date',
        'address',
        'discount',
        'total',
        'total_after_discount',
        'total_products_buy_price',
        'paid',
        'left',
        'status',
        'type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class,'order_id');
    }
}
