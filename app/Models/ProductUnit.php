<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductUnit extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'product_id',
        'unit_id',
        'count',
        'small_unit_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id');
    }

    public function smallUnit()
    {
        return $this->belongsTo(Unit::class,'small_unit_id');
    }
}
